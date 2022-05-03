<?php

namespace App\Imports;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class ImportTransactionExcel implements ToCollection, WithCalculatedFormulas
{

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function collection(Collection $rows)
    {
        $this->transaction($rows);
    }

    protected function transaction($rows)
    {
        foreach ($rows as $key => $row) {
            if ($key <= 0) continue;
            if (!$row[1]) break;
            try {

                $user = $this->createOrUpdateUser($row);
                Log::info('=================== Row: '. json_encode($row));
                Log::info('=================== Create: '. $row[1]);
                $dataTransaction                  = [];
                $dataTransaction['created_at']    = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[1]);
                $dataTransaction['t_user_id']     = $user->id;
                $dataTransaction['t_total_money'] = str_replace(',', '', $row[14]);
                $dataTransaction['t_channel']     = $row[17];
                $dataTransaction['t_admin_id']    = get_data_user('admins');
                Log::info("===================== Data: " . json_encode($dataTransaction));
            } catch (\Exception $exception) {
                Log::error("[Error ] " . $exception->getMessage());
            }
        }
    }

    protected function createOrUpdateUser($row)
    {
        $data = [
            'email'      => $row[6],
            'phone'      => $row[7],
            'created_at' => Carbon::now()
        ];

        if ($row[6]) {
            $data['name'] = (explode('@', $row[6]))[0];
        }

        $user = User::updateOrCreate([
            'email' => $row[6],
        ], $data);

        return $user;
    }

}
