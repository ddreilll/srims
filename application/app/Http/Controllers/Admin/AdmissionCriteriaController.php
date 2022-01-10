<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Controllers
use App\Http\Controllers\BusinessRules\AcadYearController as AcadYear;
use App\Http\Controllers\Admin\AdmissionRequirementsController as AdReq;


//Models
use App\AdmissionCriteria as AdCriteria;
use App\AdmissionRequirementsCriteria as AdReqCriteria;

class AdmissionCriteriaController extends Controller
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
        $admissionReq = (new AdReq)->getAllRequirements([]);
        $acadYears = (new AcadYear)->getAllYears();


        return view('admin.admission-criteria', ['sides' => 'admission-criteria', 'title' => "Admission Criteria", "formData_acadYears" => $acadYears, "formData_admissionRed" => $admissionReq]);
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

    public function getAllCriteria()
    {
        $adCriteria = new AdCriteria;

        $admissionCriteria = $adCriteria->fetchAll([]);

        for ($i = 0; $i < sizeOf($admissionCriteria); $i++) {

            $requirements = $adCriteria->fetchRequirements($admissionCriteria[$i]['adcr_id_md5']);
            $admissionCriteria[$i]['adcr_requirements'] = $requirements;
        }

        return $admissionCriteria;
    }

    public function getCriteria($md5Id)
    {

        $adCriteria = new AdCriteria;

        $admissionCriteria = $adCriteria->fetchOne($md5Id);
        $admissionCriteria[0]['adcr_requirements'] = $adCriteria->fetchRequirements($md5Id);

        return $admissionCriteria;
    }

    public function createCriteria($details, $requirements)
    {
        $criteriaId = (new AdCriteria)->insertOne($details); //Insert Criteria and get the id

        for ($i = 0; $i < sizeof($requirements); $i++) {
            $this->addRequirement($requirements[$i]['id'], $criteriaId); //Insert the Requirement and Criteria association
        }
    }

    public function updateCriteria($md5Id, $details, $requirements)
    {
        $criteria = $this->getCriteria($md5Id)[0];

        $adCriteria = new AdCriteria;
        $adCriteria->edit($md5Id, $details);

        $orig_requirements = [];
        $d = $adCriteria->fetchRequirements($md5Id);
        for ($i = 0; $i < sizeof($d); $i++) {
            array_push($orig_requirements, $d[$i]['adre_id']);
        }



        $diff_requirements_1 = array_diff($orig_requirements, $requirements);
        $diff_requirements_2 = array_diff($requirements, $orig_requirements);

        $diff_requirements = array_merge($diff_requirements_1, $diff_requirements_2);


        for ($a = 0; $a < sizeOf($diff_requirements); $a++) {
            for ($b = 0; $b < sizeOf($orig_requirements); $b++) {

                if (sizeOf($diff_requirements) >= 1) {
                    if ($diff_requirements[$a] == $orig_requirements[$b]) {
                        $this->removeRequirement($diff_requirements[$a], $criteria['adcr_id']);
                        \array_splice($diff_requirements, $a, 1);
                    }
                }
            }
        }

        for ($c = 0; $c < sizeOf($diff_requirements); $c++) {
            $this->addRequirement($diff_requirements[$c], $criteria['adcr_id']);
        }
    }

    public function removeCriteria($md5Id)
    {
        (new AdCriteria)->remove($md5Id);
    }

    // Criteria Requirements

    public function removeRequirement($requirementId, $criteriaId)
    {
        (new AdReqCriteria)->remove($requirementId, $criteriaId);
    }

    public function addRequirement($requirementId, $criteriaId)
    {
        (new AdReqCriteria)->insert(["adcr_arcr_id" => $criteriaId, "adre_arcr_id" => $requirementId]);
    }


    // -- Begin::Ajax Requests -- //

    public function ajax_insert(Request $request)
    {

        $request->validate([
            'yearStart' => 'required|max:4',
            'yearEnd' => 'required|max:4',
            'requirements' => 'required'
        ]);

        $details = ['yearStart' => $request->yearStart, 'yearEnd' => $request->yearEnd];

        $requirements = [];
        for ($i = 0; $i < sizeOf($request['requirements']); $i++) {
            array_push($requirements, ['id' => $request['requirements'][$i]]);
        }

        $this->createCriteria($details, $requirements);

        header('Content-Type: application/json');
        echo json_encode([
            'status' => "200",
            'message' => __('modal.added_success', ['attribute' => 'Criteria'])
        ]);
    }

    public function ajax_retrieveAll()
    {

        header('Content-Type: application/json');
        echo json_encode([
            'status' => "200",
            'data' => $this->getAllCriteria()
        ]);
    }

    public function ajax_retrieve(Request $request)
    {

        $request->validate([
            'id' => 'required'
        ]);

        header('Content-Type: application/json');
        echo json_encode([
            'status' => "200",
            'data' => $this->getCriteria($request->id)
        ]);
    }

    public function ajax_update(Request $request)
    {

        $request->validate([
            'id' => 'required',
            'yearStart' => 'required|max:4',
            'yearEnd' => 'required|max:4',
            'requirements' => 'required'
        ]);

        $details = ['yearStart' => $request['yearStart'], 'yearEnd' => $request['yearEnd']];

        $requirements = [];
        for ($i = 0; $i < sizeOf($request['requirements']); $i++) {
            array_push($requirements, $request['requirements'][$i] * 1);
        }

        $this->updateCriteria($request['id'], $details, $requirements);

        header('Content-Type: application/json');
        echo json_encode([
            'status' => "200",
            'message' => __('modal.updated_success', ['attribute' => 'Requirement'])
        ]);
    }

    public function ajax_delete(Request $request)
    {

        $request->validate([
            'id' => 'required'
        ]);


        $this->removeCriteria($request['id']);

        header('Content-Type: application/json');
        echo json_encode([
            'status' => "401",
            'message' => __('modal.deleted_success', ['attribute' => 'Criteria'])
        ]);
    }
    // -- End::Ajax Requests -- //


    /*
|--------------------------------------------------------------------------
|    Begin::Views
|-------------------------------------------------------------------------- 
|
*/
}
