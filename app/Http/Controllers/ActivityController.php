<?php

namespace App\Http\Controllers;

use App\Models\TypeActivity;
use App\Models\Activity;
use App\Models\Inscription;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function showAllActivities()
    {
        //$activities = Activity::all();
        $activities = Activity::orderBy('dateAct')->get();
        $activityTypes = TypeActivity::all();

        return view('dashboard.showAllActivities', compact("activities","activityTypes"));
    }

    public function formCreateActivity()
    {
        $activityTypes = TypeActivity::all();
        return view("dashboard.createActivity", compact("activityTypes"));
    }

    public function saveActivity(Request $request)
    {
        $request->validate([
            'nameAct' => 'required',
            'descAct' => 'required',
            'entityAct' => 'required',
            'timeAct' => 'required',
            'dateAct' => 'required',
            'quotasAct' => 'required',
        ]);

        $activity = new Activity;
        
        $activity->nameAct = $request->nameAct;
        $activity->descAct = $request->descAct;
        $activity->entityAct = $request->entityAct;
        $activity->timeAct = $request->timeAct;
        $activity->dateAct = $request->dateAct;
        if ($request->isPreseAct=="on"){
            $activity->isPreseAct = true;
        }else{
            $activity->isPreseAct = false;
        }
        $activity->quotasAct = $request->quotasAct;



        $activity->direAct = $request->direAct;
        $activity->requiPrevAct = $request->requiPrevAct;
        $activity->requiAct = $request->requiAct;
        $activity->formaAct = $request->formaAct;
        $activity->endTimeAct = $request->endTimeAct;


        $activity->save();
        $activity->typeAct()->attach($request->ActTypes);


        session()->flash('sucessActivityCreated', 'Se ha CREADO una ACTIVIDAD.');
        return redirect()->route('dashboard.showAllActivities');
    }

    public function deleteActivity(Request $request)
    {
        try{
            $fromDatabase = Activity::where('activity_id',$request->id)->delete();
        }catch(\Exception $e){
            return redirect()->route('dashboard.showAllActivities');
        }

        session()->flash('sucessActivityDeleted', 'Se ha BORRADO una ACTIVIDAD.');
       return redirect()->route('dashboard.showAllActivities');
    }

    /**/

    public function doVisible(Request $request)
    {
        try{  

            $activity = Activity::where('activity_id',$request->id)
                                ->update(['isVisible'=> true]);
        }catch(\Exception $e){
            return redirect()->route('dashboard.showAllActivities');
        }
        echo $request->id;
        session()->flash('sucessVisibleActivity', 'Se ha CAMBIADO A VISIBLE una ACTIVIDAD.');
        return redirect()->route('dashboard.showAllActivities');
    }
    
    public function doInvisible(Request $request)
    {
        try{
            $activity = Activity::where('activity_id', $request->id)
                                ->update(['isVisible'=> false]);
        }catch(\Exception $e){
            return redirect()->route('dashboard.showAllActivities');
        }
            
        session()->flash('sucessVisibleActivity', 'Se ha CAMBIADO A INVISIBLE una ACTIVIDAD.');
        return redirect()->route('dashboard.showAllActivities');

    }

    public function getActivityUpdateData(Request $request)
    {
        try{
            $activity = Activity::where('activity_id',$request->id)->first();

            $activityTypes = TypeActivity::all();

            return view('dashboard.showUpdateActivityForm', compact("activity","activityTypes"));
    


        }catch(\Exception $e){
            return redirect()->route('dashboard.showAllActivities');
        }
    }

    public function updateActivity(Request $request)
    {
        $request->validate([
            'nameAct' => 'required',
            'descAct' => 'required',
            'entityAct' => 'required',
            'timeAct' => 'required',
            'dateAct' => 'required',
            'quotasAct' => 'required',
            'direAct' => 'required',
            'requiPrevAct' => 'required',
            'formaAct' => 'required',
            'endTimeAct' => 'required',
            'requiAct' => 'required',
        ]);

        if ($request->isPreseAct=="on"){
            $presen = true;
        }else{
            $presen = false;
        }

        $activity = Activity::where('activity_id', $request->activity_id);

        $activity->update([
                    'nameAct' => $request->nameAct,
                    'descAct' => $request->descAct,
                    'entityAct' => $request->entityAct,
                    'timeAct' => $request->timeAct,
                    'dateAct' => $request->dateAct,
                    'quotasAct' => $request->quotasAct,  
                    'isPreseAct' => $presen,       
                    'direAct' => $request->direAct,
                    'requiPrevAct' => $request->requiPrevAct,
                    'formaAct' => $request->formaAct,
                    'endTimeAct' => $request->endTimeAct,
                    'requiAct' => $request->requiAct,         
                ]);

        $activity = Activity::find($request->activity_id);

        $activity->typeAct()->detach();

        $activity->typeAct()->attach($request->ActTypes);

        session()->flash('sucessActivityUpdated', 'Se ha ACTUALIZADO una ACTIVIDAD.');
        return redirect()->route('dashboard.showAllActivities');
    }

    public function showAllActivitiesLogged(Request $request)
    {
        $activities = Activity::select('activities.activity_id','activities.nameAct','activities.descAct','activities.dateAct','activities.timeAct','activities.isNulledAct')
                                ->where('activities.isVisible', 1)
                                ->get();
        $activityTypes = TypeActivity::all();
        return view('dashboard.showAllActivitiesLogged', compact("activities","activityTypes"));
    }

    /* Metodo para filtrar por fecha pepe */

    public static function showActivitiesByDate($dateActivity)
    {

        $activities = Activity::where('activities.dateAct', $dateActivity)
                                ->get();
        return redirect()->route('dashboard.showAllActivitiesLogged');

    }


    public static function quotaCalculator($quota,$activity_id)
    {
        $inscription = Inscription::where('activity_id',$activity_id)
                                    ->where('isCompletedIns',true)
                                    ->count();
        return ($quota-$inscription);
    }

    public static function inscriptedYet($activity_id, $volunteer_id)
    {
        if (Inscription::where('activity_id', $activity_id)
                        ->where('volunteer_id', $volunteer_id)
                        ->count() != 0) {
                            return true;
        } else
            return false;
    }

    public function showThatActivity ($activity_id)
    {
        $activity = Activity::where('activity_id',$activity_id)
                            ->where('isVisible',true)
                            ->first();
        $activityTypes = TypeActivity::all();
        return view('dashboard.showThatActivity', compact("activity","activityTypes"));
    }

    /* Método para buscar actividades pepe */

    public function searchActivity1(Request $request){

        if($request->ajax()){
    
            $data=Activity::where('activity_id','like','%'.$request->searchActivity.'%')
            ->orwhere('nameAct','like','%'.$request->searchActivity.'%')
            ->orderBy('dateAct')->get();

            $activityTypes = TypeActivity::all();

            $output = '';

            if(count($data)>0){

                $output ='';

                foreach($data as $row){

                    $output .='

                    <div class="row" style="baseDashboard.css">';
                        if(strtotime(date("d-m-Y", strtotime($row->dateAct)))<(strtotime(date("d-m-Y")))){
                            $output .= '<div class="divTime" style="background-color:#DDBFC8;">  ';
                        }elseif(!$row->isNulledAct){
                            $output .= '<div class="divTime" style="background-color: #406cbc;"> ';
                        }else{
                            $output .= '<div class="divTime" style="background-color:#8A8A8A";>';
                        } 
                            $output .= '<div class="dateDiv"> '.date("d-m-Y", strtotime($row->dateAct)) .'</div>
                            <div class="hourDiv"> '. date("H:i", strtotime($row->timeAct)) .'</div> 
     
                        </div>
                        
                        <div class="divMainDesc">
                            <div class="nameDiv">
                                <strong> '.$row->nameAct.'  </strong>
                            </div>
                            <div class="descDiv">
                                '.$row->descAct.'
                            </div>
                            <div class="cupoDiv">
                                <strong>Cupo: </strong>
                                '. ActivityController::quotaCalculator($row->quotasAct, $row->activity_id).'
                                /
                                '. $row->quotasAct .'
                                Libres
                            </div>
                        </div>    
                        
                        <div class="divVis">';
                            if ($row->isVisible == 0){
                                $output .= '<form method="POST" action=" '.route("dashboard.visibleActivity").' ">';
                                $output .= csrf_field();
                                $output .= '<input type="hidden" name="id" value="'.$row->activity_id .'">
                                <button type="submit" class="botonVis"
                                    onclick="return confirm("¿Estas seguro/a?")">
                                    PUBLICAR
                                    <br />
                                    <i class="bx bx-show"></i>
                                </button>
                            </form>';
                            }else{
                                $output .= '<form method="POST" action="'.route("dashboard.invisibleActivity").'">';
                                $output .= csrf_field();
                                $output .= ' <input type="hidden" name="id" value="'.$row->activity_id .'">
                                <button type="submit" class="botonVis"
                                    onclick="return confirm("¿Estas seguro/a?")">
                                    DESPUBLICAR
                                    <br />
                                    <i class="bx bxs-low-vision"></i>
                                </button>
                            </form>';
                            }
                                
                            $output .= '<div class="controlButton-moreDetails">
                            <i class="bx bxs-down-arrow"></i>
                        </div>
                        
                    </div>
                            </div>
                ';

                $output .='
                
                
                <div class="hidden">
                    <div class="eachRow">
                        <div>
                            <strong>Descripcion: </strong>
                            '. $row->descAct .'
                        </div>
                        <div>
                            <strong>Entidad: </strong>
                            '. $row->entityAct .'
                        </div>
                        <div>
                            <strong>Dirección: </strong>
                            '. $row->direAct .'
                        </div>
                        <div>
                            <strong>Requisito Previo: </strong>
                            '.  $row->requiPrevAct .'
                        </div>
                        <div>
                            <strong>Formacion deseada: </strong>
                            '. $row->formaAct .'
                        </div>
                        <div>
                            <strong>Requisitos: </strong>
                            '. $row->requiAct .'
                        </div>

                        <div>
                        <strong>Tipos de Actividad: </strong>';

                          foreach ($activityTypes as $activityType){
                            foreach ($row->typeAct as $itemActivityType){
                                if ($activityType->typeAct_id == $itemActivityType->typeAct_id){
                                    $output .= '<p>'.$itemActivityType->nameTypeAct.'</p>';
                                }
                            }
                        }                                                           

                    $output .='</div>

                    </div>
                    
                    <div class="buttonsBar">

                        <div>
                        <strong>Información Extra: </strong>
                        <form method="POST" action="'. route("dashboard.showAllExtraActivity") .'">';

                        $output .= csrf_field();
                        $output .= '<input type="hidden" name="id" value="'. $row->activity_id .'">
                                <button type="submit" class="botonesControl">
                                <i class="bx bx-folder-plus" style="font-size:25px;" ></i>
                            </button>
                        </form>
                        </div>

                            <div>
                                <strong>Editar: </strong>

                                <form method="POST" action="'. route("dashboard.getActivityUpdateData").'">';
                                $output .= csrf_field();
                                    $output .= '<input type="hidden" name="id" value="'. $row->activity_id .'">
                                        <button type="submit" class="botonesControl">
                                        <i class="bx bxs-edit" style="font-size:25px;"></i>
                                    </button>
                                </form>
                            </div>

                            <div>';

                                if (!$row->isNulledAct){
                                    $output .='<strong>ANULAR: </strong>

                                    <form method="POST" action="'. route("dashboard.nullActivity") .'">';
                                    $output .= csrf_field();

                                    $output .= '<input type="hidden" name="id" value="'. $row->activity_id .'">
                                            <button type="submit" class="botonesControl"
                                            onclick="return confirm(¿Estas seguro/a?)">
                                            <i class="bx bxs-x-square" style="font-size:25px;"></i>
                                        </button>
                                    </form>';
                                }
                                else{
                                    $output .='    <strong>Esta actividad se ha anulado</strong>';
                                }
                                
                            $output .='

                            </div>

                            <div>
                                <strong>Eliminar: </strong>
                                <form method="POST" action="'.route("dashboard.deleteActivity").'">';
                                    $output .= csrf_field();
                                    $output .= '<input type="hidden" name="id" value="'. $row->activity_id .'">
                                        <button type="submit" class="botonesControl"
                                        onclick="return confirm(¿Estas seguro/a?)"><i class="bx bx-trash"
                                            style="font-size:25px;"></i></button>
                                </form>
                            </div>
                        </div>
                     
                    
                </div>

                    
                
                ';

                }

            }else{

                $output .= "No se han encontrado actividades";

            }

            return $output;

        }

    }

    public function searchActivity(Request $request){

        if($request->ajax()) {
            $query = $request->get('searchActivity');
            if(empty($query)) {
                $activities=Activity::where('id','like','%'.$request->searchActivity.'%')
                ->orwhere('nameVol','like','%'.$request->searchActivity.'%')
                ->orwhere('surnameVol','like','%'.$request->searchActivity.'%')->get();
            } else {
                $activities=Activity::where('id','like','%'.$request->searchActivity.'%')
                ->orwhere('nameVol','like','%'.$request->searchActivity.'%')
                ->orwhere('surnameVol','like','%'.$request->searchActivity.'%')->get();
            }
            $total = $activities->count();
        
            $html = view('dashboard.partials.itemListActivity', [
                'activities' => $activities,
            ])->render();             
        
            return response()->json([
                'success' => true,
                'html' => $html,
                'total' => $total,
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => "Something went wrong!",
            ], 403);
        }

    }

    public function showFilterByTypeAct($id)
    {
        $typeAct = TypeActivity::where('typeAct_id',$id)->first();
 
        $activities=$typeAct->activity;

        $activityTypes = TypeActivity::all();
        $typeAct = $typeAct->nameTypeAct;

        return view('dashboard.showActivitiesByCategoryLogged', compact("activities","activityTypes","typeAct"));
    }

    public function nullActivity(Request $request)
    {
        $activity = Activity::where('activity_id',$request->id)->first();
        Activity::where('activity_id',$request->id)->first()->update(['isNulledAct'=> true]);

        foreach ($activity->volunteers as $volunteer) {
            EmailController::nullActivityMail(
                $activity->nameAct,
                $volunteer->persMailVol
            ); 
        }
        session()->flash('nullActivity', 'Se ha ANULADO una ACTIVIDAD.');
        return redirect()->route('dashboard.showAllActivities');
    }

}