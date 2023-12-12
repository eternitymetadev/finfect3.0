<?php
  
namespace App\Exports;
  
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        ini_set('memory_limit', '2048M');
        set_time_limit ( 6000 );
        $arr = array();
        $query = User::query();
 
        $users = $query->get();
 
        if($users->count() > 0){
            foreach ($users as $key => $user){  
 
                if($user->status == 1){
                    $status = 'Active';
                }else{
                    $status = 'Inactive';
                }

                if (!empty($user->pfu)){
                    $assign_pfu = explode(',',$user->pfu);
                    $pfu = \App\Models\Pfu::select('id','pfu')->whereIn('id',$assign_pfu)->get();
                    $pfuValues = $pfu->pluck('pfu')->toArray();
                    $result = implode(',', $pfuValues);
                    }else{
                    $result = '-';
                    }
                         
                $arr[] = [
                    'name' => $user->name,
                    'pfu' => $result,
                    'email' => $user->email,
                    'mobile' => $user->mobile,
                    'role' => $user->getRoleNames()->first(),
                    'status' => @$status
                ];
            }
        }                
        return collect($arr);
    }
    public function headings(): array
    {
        return [
            'Name',
            'Pfu',
            'Email',
            'Mobile',
            'Role',
            'Status'
        ];
    }
}