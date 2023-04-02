<?php

namespace App\Http\Controllers;

use App\Models\Delegation;
use App\Models\TypeActivity;
use App\Models\Activity;
use App\Models\Inscription;
use App\Models\Entity;
use App\Models\Activity_Entity;
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
        $entities = Entity::all();
        return view("dashboard.createActivity", compact("activityTypes", 'entities'));
    }

    public function showActivitiesGenially()
    {

        return view("dashboard.showActivitiesGenially");
    }

    public function showWeekCalendarGenially()
    {

        return view("dashboard.showWeekCalendarGenially");
    }

    public function saveActivity(Request $request)
    {
        $request->validate([
            'nameAct' => 'required',
            'descAct' => 'required',
            'timeAct' => 'required',
            'dateAct' => 'required',
            'quotasAct' => 'required',
        ]);

        $activity = new Activity;
        
        $activity->nameAct = $request->nameAct;
        $activity->descAct = $request->descAct;
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
        $activity->entity()->attach($request->Entities, ['dateAct' => $request -> dateAct]);
        
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

    public function doVisible(Request $request)
    {
        try{  

            $activity = Activity::where('activity_id',$request->id)
                                ->update(['isVisible'=> true]);
        }catch(\Exception $e){
            return redirect()->route('dashboard.showAllActivities');
        }
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
            $entities = Entity::all();

            return view('dashboard.showUpdateActivityForm', compact("activity","activityTypes",'entities'));
    


        }catch(\Exception $e){
            return redirect()->route('dashboard.showAllActivities');
        }
    }

    public function updateActivity(Request $request)
    {
        $request->validate([
            'nameAct' => 'required',
            'descAct' => 'required',
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

        $activity->entity()->detach();

        $activity->entity()->attach($request->Entities, ['dateAct' => $request -> dateAct]);

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

    public function showActivitiesOptions(){
        return view('dashboard.showActivitiesOptions');
    }

    public function showActivitiesByCategory(){

        $delegations = Delegation::all();
        $activityTypes = TypeActivity::all();    
        return view('dashboard.showActivitiesByCategory', compact("activityTypes", "delegations"));
    }

    public function showActivitiesByDate(){
        $activities = Activity::select('activities.activity_id','activities.nameAct','activities.descAct','activities.dateAct','activities.timeAct','activities.isNulledAct')
                                ->where('activities.isVisible', 1)
                                ->get();
        $activityTypes = TypeActivity::all();
        return view('dashboard.showActivitiesByDate', compact("activities", "activityTypes"));
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

    public function showThatActivity($activity_id)
    {
        $activity = Activity::where('activity_id',$activity_id)
                            ->first();
        $activityTypes = TypeActivity::all();
        return view('dashboard.showThatActivity', compact("activity","activityTypes"));
    } 

    public function searchActivity(Request $request){

        if($request->ajax()) {
            $query = $request->get('searchActivity');
            if(empty($query)) {
                $activities=Activity::where('activity_id','like','%'.$request->searchActivity.'%')
                ->orwhere('nameAct','like','%'.$request->searchActivity.'%')->orderBy('dateAct', 'asc')->get();
                $activityTypes = TypeActivity::all();
            } else {
                $activities=Activity::where('activity_id','like','%'.$request->searchActivity.'%')
                ->orwhere('nameAct','like','%'.$request->searchActivity.'%')->orderBy('dateAct', 'asc')->get();
                $activityTypes = TypeActivity::all();
            }
            $total = $activities->count();
        
            $html = view('dashboard.partials.itemListActivity', [
                'activities' => $activities,
                'activityTypes' => $activityTypes,
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
     
        $activity = Activity::where('activity_id',$request->id);
        $nullAct = $activity->value('isNulledAct');

        if($nullAct == 1){
            $activity->update(['isNulledAct' => false]);
            $msg = "Nulidad deshecha.";
        }else{
            $activity->update(['isNulledAct' => true]);
            $msg = "Actividad anulada." ;       
        }     
       
        //Envía e-mail a los usuarios inscritos notificando la anulación de la actividad

         /* foreach ($activity->volunteers as $volunteer) {
            EmailController::nullActivityMail(
                $activity->nameAct,
                $volunteer->persMailVol
            ); 
        } */    

        session()->flash('nullActivity', $msg);

        return redirect()->route('dashboard.showAllActivities');
    }

    public function searchDayActivity(Request $request){

        if($request->ajax()) {
            $query = $request->get('searchDayActivity');
            if(empty($query)) {               
                $activities=Activity::where('dateAct','like','%'.$request->searchDayActivity.'%')->orderBy('dateAct', 'asc')->get();
                $activityTypes = TypeActivity::all();
                $entities = Entity::all();
            } else {
                $activities=Activity::where('dateAct','like','%'.$request->searchDayActivity.'%')->orderBy('dateAct', 'asc')->get();
                $activityTypes = TypeActivity::all();                
                $entities = Entity::all();
            }
            $total = $activities->count();
        
            $html = view('dashboard.partials.itemDayAct', [
                'activities' => $activities,
                'activityTypes' => $activityTypes,
                'entities' => $entities,
                'query' => $query,
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

}