<?php

namespace Muserpol\Http\Controllers\API;

use Illuminate\Http\Request;
use Muserpol\Http\Controllers\Controller;
use Muserpol\Models\RetirementFund\RetirementFund;
use Yajra\DataTables\DataTables;
use Muserpol\Helpers\Util;
use DB;
use Muserpol\Models\Role;
use Muserpol\Models\Workflow\Workflow;
use Auth;
use Muserpol\Models\Workflow\WorkflowState;
use Muserpol\Models\Workflow\WorkflowSequence;
class DocumentController extends Controller
{
    public function received(Request $request, $rol_id, $user_id)
    {
        $module = Role::find($rol_id)->module;
        // return DB::table('wf_states')->where('role_id', '=',10)->get();
        switch ($module->id) {
            case 1:
                # code...
                break;
            case 2:
                # eco com
                $documents = DB::table('economic_complements')
                    ->select(
                    DB::raw(
                            "
                        economic_complements.id as id,
                        affiliates.identity_card as ci,
                        trim(regexp_replace(concat_ws(' ', affiliates.first_name,affiliates.second_name,affiliates.last_name,affiliates.mothers_last_name, affiliates.surname_husband), '\s+', ' ', 'g')) as name,
                        economic_complements.code as code,
                        eco_com_cities.second_shortened as city,
                        economic_complements.reception_date as reception_date,
                        economic_complements.workflow_id as workflow_id,
                        concat('/economic_complement/', economic_complements.id) as path
                        "
                    )
                )
                    ->leftJoin('affiliates', 'economic_complements.affiliate_id', '=', 'affiliates.id')
                    ->leftJoin('cities as eco_com_cities', 'economic_complements.city_id', '=', 'eco_com_cities.id')
                    ->leftJoin('wf_states', 'economic_complements.wf_current_state_id', '=', 'wf_states.id')
                    ->where('wf_states.role_id', '=', $rol_id)
                    ->where('economic_complements.state', '=', 'Received')
                    ->get();
                $documents_edited_total = DB::table('economic_complements')
                ->select(
                    DB::raw(
                            "
                        economic_complements.id as id,
                        affiliates.identity_card as ci,
                        trim(regexp_replace(concat_ws(' ', affiliates.first_name,affiliates.second_name,affiliates.last_name,affiliates.mothers_last_name, affiliates.surname_husband), '\s+', ' ', 'g')) as name,
                        economic_complements.code as code,
                        eco_com_cities.second_shortened as city,
                        economic_complements.reception_date as reception_date,
                        economic_complements.workflow_id as workflow_id,
                        concat('/economic_complement/', economic_complements.id) as path,
                        false as status
                        "
                    )
                )
                    ->leftJoin('affiliates', 'economic_complements.affiliate_id', '=', 'affiliates.id')
                    ->leftJoin('cities as eco_com_cities', 'economic_complements.city_id', '=', 'eco_com_cities.id')
                    ->leftJoin('wf_states', 'economic_complements.wf_current_state_id', '=', 'wf_states.id')
                    ->where('wf_states.role_id', '=', $rol_id)
                    ->where('economic_complements.state', '=', 'Edited')
                    ->where('economic_complements.user_id', '=', $user_id)
                    ->get()->count();
                break;
            case 3:
                # ret fun
                $documents = RetirementFund::select(
                    DB::raw(
                        "
                        retirement_funds.id as id,
                        affiliates.identity_card as ci,
                        trim(regexp_replace(concat_ws(' ', affiliates.first_name,affiliates.second_name,affiliates.last_name,affiliates.mothers_last_name, affiliates.surname_husband), '\s+', ' ', 'g')) as name,
                        retirement_funds.code as code,
                        ret_fun_cities.second_shortened as city,
                        retirement_funds.reception_date as reception_date,
                        retirement_funds.workflow_id as workflow_id,
                        concat('/ret_fun/', retirement_funds.id) as path
                        "
                        )
                    )
                    ->leftJoin('affiliates', 'retirement_funds.affiliate_id', '=', 'affiliates.id')
                    ->leftJoin('cities as ret_fun_cities', 'retirement_funds.city_end_id', '=', 'ret_fun_cities.id')
                    ->leftJoin('wf_states', 'retirement_funds.wf_state_current_id', '=', 'wf_states.id')
                    ->where('wf_states.role_id', '=', $rol_id)
                    ->where('retirement_funds.inbox_state', '=', false)
                    ->get();
                $documents_edited_total = RetirementFund::select('retirement_funds.id as id')
                    ->leftJoin('affiliates', 'retirement_funds.affiliate_id', '=', 'affiliates.id')
                    ->leftJoin('cities as ret_fun_cities', 'retirement_funds.city_end_id', '=', 'ret_fun_cities.id')
                    ->leftJoin('wf_states', 'retirement_funds.wf_state_current_id', '=', 'wf_states.id')
                    ->where('wf_states.role_id', '=', $rol_id)
                    ->where('retirement_funds.inbox_state', '=', true)
                    ->where('retirement_funds.user_id', '=', $user_id)
                    ->get()->count();
                
                break;
            default:
                # code...
                break;
        }

        $temp = Workflow::leftJoin('modules', 'workflows.module_id', '=', 'modules.id')
                ->leftJoin('roles', 'modules.id', '=', 'roles.module_id')
                ->select('workflows.id')
                ->where('roles.id', '=', $rol_id)
                ->pluck('id');
        $workflows = Workflow::whereIn('id',$temp)->get();
        $data = [
            'documents_received_total' => $documents->count() ?? 0,
            'documents_edited_total' => $documents_edited_total ?? 0,
            'documents' => $documents,
            'workflows' => $workflows
        ];
        return $data;
        // return DataTables::of($documents)
        //     ->editColumn('name', function ($document)
        //     {
        //         return  '<a href = "'.url('ret_fun',     [$document->id]).'">'.$document->name.'</a>';
        //     })
        //     ->rawColumns(['ci','name','code'])
        //     ->make(true);
    }

    public function edited(Request $request, $rol_id, $user_id)
    {
        
        $module = Role::find($rol_id)->module;
        switch ($module->id) {
            case 1:
                # code...
                break;
            case 2:
                # eco com
                $documents = DB::table('economic_complements')
                ->select(
                    DB::raw(
                            "
                        economic_complements.id as id,
                        affiliates.identity_card as ci,
                        trim(regexp_replace(concat_ws(' ', affiliates.first_name,affiliates.second_name,affiliates.last_name,affiliates.mothers_last_name, affiliates.surname_husband), '\s+', ' ', 'g')) as name,
                        economic_complements.code as code,
                        eco_com_cities.second_shortened as city,
                        economic_complements.reception_date as reception_date,
                        economic_complements.workflow_id as workflow_id,
                        concat('/economic_complement/', economic_complements.id) as path,
                        false as status
                        "
                    )
                )
                    ->leftJoin('affiliates', 'economic_complements.affiliate_id', '=', 'affiliates.id')
                    ->leftJoin('cities as eco_com_cities', 'economic_complements.city_id', '=', 'eco_com_cities.id')
                    ->leftJoin('wf_states', 'economic_complements.wf_current_state_id', '=', 'wf_states.id')
                    ->where('wf_states.role_id', '=', $rol_id)
                    ->where('economic_complements.state', '=', 'Edited')
                    ->where('economic_complements.user_id', '=', $user_id)
                    ->get();
                $documents_received_total = DB::table('economic_complements')
                    ->select(
                        DB::raw(
                            "
                        economic_complements.id as id,
                        affiliates.identity_card as ci,
                        trim(regexp_replace(concat_ws(' ', affiliates.first_name,affiliates.second_name,affiliates.last_name,affiliates.mothers_last_name, affiliates.surname_husband), '\s+', ' ', 'g')) as name,
                        economic_complements.code as code,
                        eco_com_cities.second_shortened as city,
                        economic_complements.reception_date as reception_date,
                        economic_complements.workflow_id as workflow_id,
                        concat('/economic_complement/', economic_complements.id) as path
                        "
                        )
                    )
                    ->leftJoin('affiliates', 'economic_complements.affiliate_id', '=', 'affiliates.id')
                    ->leftJoin('cities as eco_com_cities', 'economic_complements.city_id', '=', 'eco_com_cities.id')
                    ->leftJoin('wf_states', 'economic_complements.wf_current_state_id', '=', 'wf_states.id')
                    ->where('wf_states.role_id', '=', $rol_id)
                    ->where('economic_complements.state', '=', 'Received')
                    ->get()->count();
                break;
            case 3:
                # ret fun
                $documents = RetirementFund::select(
                    DB::raw(
                        "
                        retirement_funds.id as id,
                        affiliates.identity_card as ci,
                        trim(regexp_replace(concat_ws(' ', affiliates.first_name,affiliates.second_name,affiliates.last_name,affiliates.mothers_last_name, affiliates.surname_husband), '\s+', ' ', 'g')) as name,
                        retirement_funds.code as code,
                        ret_fun_cities.second_shortened as city,
                        retirement_funds.reception_date as reception_date,
                        retirement_funds.workflow_id as workflow_id,
                        concat('/ret_fun/', retirement_funds.id) as path,
                        false as status
                        "
                        )
                    )
                    ->leftJoin('affiliates', 'retirement_funds.affiliate_id', '=', 'affiliates.id')
                    ->leftJoin('cities as ret_fun_cities', 'retirement_funds.city_end_id', '=', 'ret_fun_cities.id')
                    ->leftJoin('wf_states', 'retirement_funds.wf_state_current_id', '=', 'wf_states.id')
                    ->where('wf_states.role_id', '=', $rol_id)
                    ->where('retirement_funds.inbox_state', '=', true)
                    ->where('retirement_funds.user_id', '=', $user_id)
                    ->get();
                $documents_received_total = RetirementFund::select('retirement_funds.id as id')
                    ->leftJoin('affiliates', 'retirement_funds.affiliate_id', '=', 'affiliates.id')
                    ->leftJoin('cities as ret_fun_cities', 'retirement_funds.city_end_id', '=', 'ret_fun_cities.id')
                    ->leftJoin('wf_states', 'retirement_funds.wf_state_current_id', '=', 'wf_states.id')
                    ->where('wf_states.role_id', '=', $rol_id)
                    ->where('retirement_funds.inbox_state', '=', false)
                    ->get()->count();
                break;
            default:
                # code...
                break;
        }
        $temp = Workflow::leftJoin('modules', 'workflows.module_id', '=', 'modules.id')
            ->leftJoin('roles', 'modules.id', '=', 'roles.module_id')
            ->select('workflows.id')
            ->where('roles.id', '=', $rol_id)
            ->pluck('id');
        $wf_current_state = WorkflowState::where('role_id', $rol_id)->where('module_id','=', $module->id)->first();
        if ($wf_current_state) {
            $wf_sequences_next = WorkflowSequence::leftJoin('wf_states', 'wf_sequences.wf_state_next_id', '=', 'wf_states.id')
                ->whereIn("workflow_id", $temp)
                ->where("wf_state_current_id", $wf_current_state->id)
                ->where('action', 'Aprobar')
                ->select('wf_states.id as wf_state_id', 'workflow_id as workflow_id', 'wf_states.name as wf_state_name')
                ->get();
            /* TODO (improve)*/
            $wf_sequences_back = DB::table("wf_states")
            // ->whereIn("workflow_id", $temp)
            ->where("wf_states.module_id", "=", $module->id)
            // ->where("wf_state_current_id", $wf_current_state->id)
            ->where('wf_states.sequence_number', '<', $wf_current_state->sequence_number)
            ->select('wf_states.id as wf_state_id',
            //      'workflow_id as workflow_id',
            'wf_states.name as wf_state_name')
            ->get();
        }else{
            $wf_sequences_next = null;
            $wf_sequences_back = null;
        }
        $workflows = Workflow::whereIn('id',$temp)->get();
        $data = [
            'documents_received_total' => $documents_received_total ?? 0,
            'documents_edited_total' => $documents->count() ?? 0,
            'documents' => $documents,
            'workflows' => $workflows,
            'wf_sequences_next' => $wf_sequences_next,
            'wf_current_state' => $wf_current_state,
            'wf_sequences_back' => $wf_sequences_back,
        ];
        return $data;
        // return DataTables::of($documents)
        //     ->editColumn('name', function ($document)
        //     {
        //         return  '<a href = "'.url('ret_fun',     [$document->id]).'">'.$document->name.'</a>';
        //     })
        //     ->rawColumns(['ci','name','code'])
        //     ->make(true);
    }
}
