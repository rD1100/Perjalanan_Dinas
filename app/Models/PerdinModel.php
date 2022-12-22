<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PerdinModel extends Model
{
    use HasFactory;
    protected $table = 'tb_perdins';
    // protected $primaryKey = 'perdin_id';
    public $timestamps= false;
    protected $fillable = ['id','user_id','distance','departure_date','return_date','hometown' , 'destination_town','comment','duration' ];
    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function allData()
    {
        
        $joinQuery= DB::table('tb_perdins')
            ->leftJoin('users', 'tb_perdins.user_id', '=', 'users.id')
            ->get();

            foreach ($joinQuery as $item)
            {
                $name_query=$item->name;
                $firstCity_query=$item->hometown;
                $secondCity_query=$item->destination_town;
                $firstDate_query=$item->departure_date;
                $secondDate_query=$item->return_date;
                $comment_query=$item->comment;
          
     
           
                 DB::table('approved_perdins_tb')->insertGetId(
                        ['nama' => $name_query,
                        'Kota_awal' => $firstCity_query,
                        'kota_tujuan' => $secondCity_query,
                        'tanggal_awal' => $firstDate_query,
                        'tanggal_akhir' => $secondDate_query,
                        'comment' => $comment_query]
                  
                 );

                 return $joinQuery;
           }

        
    }

    public function insertjoinData()
    {
        return DB::table('approved_perdins_tb')->insertGetId(
            ['nama' => 'john@example.com', 'votes' => 0]
        );
    }

    public function editOneDataTbPerdin($id)
    {
        
        return DB::table('tb_perdins')
        ->leftJoin('users', 'tb_perdins.user_id', '=', 'users.id')
        ->where('user_id',$id)
        ->get();
        
    }

    public function updateOneDataTbPerdin($id,$dataUpdate)
    {
        
        return DB::table('tb_perdins')
        ->where('id', $id)
        ->update(['status' => $dataUpdate]);
        
    }
}
