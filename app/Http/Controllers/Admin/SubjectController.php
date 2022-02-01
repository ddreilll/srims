<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Model
use App\Models\Subject;
use App\Models\SubjectPrerequisite as SubjPrereq;

class SubjectController extends Controller
{

    /*
|--------------------------------------------------------------------------
|    Begin::Views
|--------------------------------------------------------------------------
|
|    All functions that renders or display a page
|
*/

    public function index()
    {
        $subjects = (new Subject)->fetchAll([]);

        return view('admin.subject', ['menu_header'=> 'System Setup', "title" => 'Subjects', "menu" => "course-curiculum", "sub_menu" => "subject", "formData_subjects" => $subjects]);
    }

    /*
|--------------------------------------------------------------------------
|    End::Views
|--------------------------------------------------------------------------
|
*/


    /*
|--------------------------------------------------------------------------
|    Begin::Functions
|-------------------------------------------------------------------------- 
|
*/

    // Subject details
    public function createSubject($details, $prerequisite)
    {
        $subjectId = (new Subject())->insertOne($details);

        for ($i = 0; $i < sizeof($prerequisite); $i++) {
            $this->addPrerequisite($subjectId, $prerequisite[$i]['id']);
        }
    }

    public function getSubject($md5Id)
    {

        $subject = new Subject;

        $subjects = $subject->fetchOne($md5Id);
        $subjects[0]['subj_prerequisite'] = $subject->fetchPrerequisite($subjects[0]['subj_id_md5']);

        return $subjects;
    }

    public function getAllSubjects($filter = null)
    {
        $subject = new Subject;
        $subjects = $subject->fetchAll($filter);

        for ($i = 0; $i < sizeOf($subjects); $i++) {
            $subjects[$i]['subj_prerequisite'] = $subject->fetchPrerequisite($subjects[$i]['subj_id_md5']);
        }

        return $subjects;
    }

    public function updateSubject($md5Id, $details, $prerequisite)
    {
        $subj = $this->getSubject($md5Id)[0];

        $subject = new Subject;
        $subject->edit($md5Id, $details);

        $d = $subject->fetchPrerequisite($md5Id);

        if (sizeOf($d) >= 1) {
            $orig_prerequisite = [];
            for ($i = 0; $i < sizeof($d); $i++) {
                array_push($orig_prerequisite, $d[$i]['subjpreq_subjectId']);
            }

            $diff_prerequisite_1 = array_diff($orig_prerequisite, $prerequisite);
            $diff_prerequisite_2 = array_diff($prerequisite, $orig_prerequisite);

            $diff_prerequisite = array_merge($diff_prerequisite_1, $diff_prerequisite_2);

            for ($a = 0; $a < sizeOf($diff_prerequisite); $a++) {
                for ($b = 0; $b < sizeOf($orig_prerequisite); $b++) {

                    if (sizeOf($diff_prerequisite) >= 1) {
                        if ($diff_prerequisite[$a] == $orig_prerequisite[$b]) {
                            $this->removePrerequisite($subj['subj_id'], $diff_prerequisite[$a]);
                            \array_splice($diff_prerequisite, $a, 1);
                        }
                    }
                }
            }

            for ($c = 0; $c < sizeOf($diff_prerequisite); $c++) {
                $this->addPrerequisite($subj['subj_id'], $diff_prerequisite[$c]);
            }
        } else {
            for ($c = 0; $c < sizeOf($prerequisite); $c++) {
                $this->addPrerequisite($subj['subj_id'], $prerequisite[$c]);
            }
        }
    }

    public function removeSubject($md5Id)
    {
        (new Subject)->remove($md5Id);
    }

    // Subject Prerequisite
    public function addPrerequisite($subjectId, $prerequisiteId)
    {
        (new SubjPrereq)->insertOne($subjectId, $prerequisiteId);
    }

    public function removePrerequisite($subjectId, $prerequisiteId)
    {
        (new SubjPrereq)->remove($subjectId, $prerequisiteId);
    }

    public function checkAnyPrerequisite($subjectMd5Id)
    {
        $assocSubj = (new SubjPrereq)->fetchAssocSubject($subjectMd5Id);

        if (sizeOf($assocSubj) >= 1) {
            return true;
        } else if (sizeOf($assocSubj) == 0) {
            return false;
        }
    }

    // -- Begin::Ajax Requests -- //

    public function ajax_insert(Request $request)
    {

        $request->validate([
            'code' => 'required|max:15',
            'name' => 'required|max:255',
            'units' => 'required|numeric'
        ]);

        $details = [
            'code' => $request->code, 'name' => $request->name, 'units' => $request->units
        ];

        $prerequisite = [];
        if ($request['prerequisite']) {
            for ($i = 0; $i < sizeOf($request['prerequisite']); $i++) {
                array_push($prerequisite, ['id' => $request['prerequisite'][$i]]);
            }
        }

        $this->createSubject($details, $prerequisite);

        header('Content-Type: application/json');
        echo json_encode([
            'message' => __('modal.added_success', ['attribute' => 'Subject'])
        ]);
    }

    public function ajax_retrieveAll()
    {

        header('Content-Type: application/json');
        echo json_encode($this->getAllSubjects());
    }

    public function ajax_retrieve(Request $request)
    {

        $request->validate([
            'id' => 'required'
        ]);

        header('Content-Type: application/json');
        echo json_encode($this->getSubject($request->id));
    }

    public function ajax_update(Request $request)
    {

        $request->validate([
            'id' => 'required',
            'code' => 'required|max:15',
            'name' => 'required|max:255',
            'units' => 'required|numeric'
        ]);

        $details = [
            'code' => $request->code, 'name' => $request->name, 'units' => $request->units
        ];

        $prerequisite = [];
        if ($request['prerequisite']) {
            for ($i = 0; $i < sizeOf($request['prerequisite']); $i++) {
                array_push($prerequisite, $request['prerequisite'][$i] * 1);
            }
        }

        $this->updateSubject($request['id'], $details, $prerequisite);

        header('Content-Type: application/json');
        echo json_encode([
            'message' => __('modal.updated_success', ['attribute' => 'Subject'])
        ]);
    }

    public function ajax_delete(Request $request)
    {

        $request->validate([
            'id' => 'required'
        ]);

        $this->removeSubject($request->id);

        header('Content-Type: application/json');
        echo json_encode([
            'message' => __('modal.deleted_success', ['attribute' => 'Subject'])
        ]);
    }

    public function ajax_checkDelete(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        if(!$this->checkAnyPrerequisite($request->id)){
            $availability = true;
        }else {
            $availability = false;
        }

        header('Content-Type: application/json');
        echo json_encode([
            'isDeletable' => $availability
        ]);
    }

    // -- End::Ajax Requests -- //


    /*
|--------------------------------------------------------------------------
|    End::Functions
|-------------------------------------------------------------------------- 
|
*/
}
