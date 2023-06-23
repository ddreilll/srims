<?php

namespace App\Http\Controllers\Admin;

use App\Models\Document;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\DocumentsType;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;

class DocumentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('document_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Document::with(['types'])->select(sprintf('%s.*', (new Document)->table));

            $table = Datatables::of($query);

            $table->addColumn('actions', function ($row) {
                $editGate      = 'document_edit';
                $deleteGate    = 'document_delete';
                $crudRoutePart = 'documents';

                return view('admin.users.partials.datatableActions', compact(
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('docu_name', function ($row) {
                return $row->docu_name ? $row->docu_name : '';
            });
            $table->editColumn('docu_description', function ($row) {
                return $row->docu_description ? $row->docu_description : '';
            });
            $table->editColumn('docu_category', function ($row) {
                return $row->docu_category ? $row->docu_category : '';
            });
            $table->editColumn('types', function ($row) {
                return $row->types ? count($row->types) : '';
            });
            $table->rawColumns(['actions', 'type']);

            return $table->make(true);
        }

        return view('admin.documents.index');

        // $documents = Document::order()->with('types')->paginate(10);

        // return view('admin.documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('document_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentRequest $request)
    {
        $document = Document::create(Arr::except($request->all(), ['types']));

        $document->types()->createMany($request->input('types', []));

        session()->flash('message', __('global.create_success', ["attribute" => sprintf("<b>%s %s</b>", __('global.new'), __('cruds.document.title_singular'))]));

        return redirect()->route('settings.documents.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        abort_if(Gate::denies('document_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $document = Document::where((new Document)->primaryKey, $document->docu_id)->with('types')->first();

        return view('admin.documents.show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        abort_if(Gate::denies('document_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $document = Document::where((new Document)->primaryKey, $document->docu_id)->with('types')->first();

        return view('admin.documents.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocumentRequest $request, Document $document)
    {
        $document->update(Arr::except($request->all(), ['types']));

        $document->types()->forceDelete();
        $document->types()->createMany($request->input('types', []));


        session()->flash('message', __('global.update_success', ["attribute" => sprintf("<b>%s</b>", __('cruds.document.title_singular'))]));

        return redirect()->route('settings.documents.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        abort_if(Gate::denies('document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $document->delete();

        session()->flash('info', __('global.delete_success', ["attribute" => sprintf("<b>%s</b>", __('cruds.document.title_singular'))]));

        return redirect()->route('settings.documents.index');
    }

    public function ajax_retrieve_by_category($category)
    {
        $di = new Document();
        $dd = $di->selectRaw('docu_id as `id`
        , docu_name as `text`
        ')->where(["docu_category" => strtoupper($category)])->get();

        header('Content-Type: application/json');
        echo json_encode($dd);
    }

    public function ajax_retrieveTypes(Request $request)
    {
        $dti = new DocumentsType();
        $dt = $dti->where(["docuType_document" => $request->id])->get();

        header('Content-Type: application/json');
        echo json_encode($dt);
    }
}
