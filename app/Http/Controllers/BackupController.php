<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Backup\Helpers\Format;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class BackupController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $disk = Storage::disk(config('backup.backup.destination.disks')[0]);
            $files = $disk->files(config('backup.backup.name'));
            $backups = [];
            // make an array of backup files, with their filesize and creation date
            foreach ($files as $k => $f) {
                // only take the zip files into account
                if (substr($f, -4) == '.zip' && $disk->exists($f)) {
                    $backups[] = [
                        'file_name' => str_replace(config('backup.backup.name') . '/', '', $f),
                        'file_size' => Format::humanReadableSize($disk->size($f)),
                        'last_modified' => Carbon::createFromTimestamp($disk->lastModified($f))->toDateTimeString()
                    ];
                }
            }
            // reverse the backups, so the newest one would be on top
            $backups = array_reverse($backups);

            $table = Datatables::of($backups);
            // $table->addColumn('test', function($row){
            //     return $row['id'];
            // });
            $table->addColumn('actions', function ($row) {
                $deleteGate    = 'system_backup_delete';
                $exportGate    = 'system_backup_download';
                $crudRoutePart = 'settings.backups';
                $primaryKey = 'file_name';
                $resource = 'backup';

                return view('partials.dataTables.actionBtns', compact(
                    'deleteGate',
                    'exportGate',
                    'crudRoutePart',
                    'resource',
                    'primaryKey',
                    'row'
                ));
            });

            $table->rawColumns(['actions']);

            return $table->make(true);
        }

        return view("backups.index");
    }

    public function download($file_name)
    {
        $file = config('backup.backup.name') . '/' . $file_name;
        $disk = Storage::disk(config('backup.backup.destination.disks')[0]);
        if ($disk->exists($file)) {
            return Storage::download($file);
        } else {

            session()->flash('message', 'The backup file doesn\'t exist.');
            return redirect()->route('settings.backups.index');
        }
    }

    public function destroy($file_name)
    {
        $disk = Storage::disk(config('backup.backup.destination.disks')[0]);
        if ($disk->exists(config('backup.backup.name') . '/' . $file_name)) {
            $disk->delete(config('backup.backup.name') . '/' . $file_name);

            session()->flash('info', __('global.delete_success', ["attribute" => sprintf("<b>%s</b>", __('Backup'))]));

            return redirect()->route('settings.backups.index');
        } else {

            session()->flash('message', 'The backup file doesn\'t exist.');
            return redirect()->route('settings.backups.index');
        }
    }
}
