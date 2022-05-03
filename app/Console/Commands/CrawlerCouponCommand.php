<?php

namespace App\Console\Commands;

use App\Models\Models\Coupon;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Console\Command;

class CrawlerCouponCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coupon:crawler';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $endpoint = 'https://pub2-api.accesstrade.vn/v1/creative/coupon';
            $client = new \GuzzleHttp\Client([
                'headers' => [
                    'authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE2MzIzODg1NTIsImlhdCI6MTYzMTg4ODU1MiwibmJmIjoxNjMxODg4NTUyLCJqdGkiOiIyMDIxLTA5LTE3IDE0OjIyOjMyLjMwNDY1MF81NzQ3NzU0NjgzMjcxMjQ0MTk3IiwiaWRlbnRpdHkiOnsiaWQiOiI1NDY2MTYyNTkzNDU5NTgyNjQ4Iiwic3NvX2lkIjoxOTkxNTcwLCJsb2dpbl9uYW1lIjoibW9ua2V5cGhhbiIsImZvbGxvd2VyIjpudWxsLCJsb2dpbl9uYW1lX3NzbyI6Im1vbmtleXBoYW4iLCJ0b2tlbl9wcm9maWxlIjoiMDc0YzM0ODEtMzFmZi00ZDVmLWJmODgtZGU0MmI0M2JjYjMwIiwiZW1haWwiOiJwaHVwdC5odW1nLjk0QGdtYWlsLmNvbSIsImZpcnN0X25hbWUiOiJQaFx1MDBmYSIsImxhc3RfbmFtZSI6IlBoYW4iLCJkYXRlX2JpcnRoIjoiMTk5MC0wMS0wMSIsImFnZW5jeSI6ZmFsc2UsIl9hdF9pZCI6IjUyMTA3MiIsImlzRnJhbWUiOmZhbHNlLCJ1c2VybmFtZSI6Im1vbmtleXBoYW4iLCJwaG9uZSI6Iis4NDk4NjQyMDk5NCIsImFkZHJlc3MiOiJVbmtub3duIGFkZHJlc3MiLCJnZW5kZXIiOjEsImN0aW1lIjoiIiwiZGVzY3JpcHRpb24iOiIiLCJhdmF0YXIiOiIiLCJtb2RlbCI6IiJ9fQ.6N24wZfGVzWvmPWh7VAmdeAFCto_NqEb8lD1WpYJnfU'
                ]
            ]);
            $response = $client->request('GET', $endpoint, ['query' => [
                'page' => 1,
                'limit' => 150,
            ]]);

            $body = $response->getBody()->getContents();
            $body = json_decode($body, true);
            if (isset($body['data']['count']) && $body['data']['count'] > 0)
            foreach ($body['data']['data'] as $item)
            {
                Coupon::create([
//                    'data' => $item,
                    'content' => json_encode($item)
                ]);
                dump($item);
            }

        }catch (BadResponseException $exception) {
            $response = json_decode($exception->getResponse()->getBody()->getContents(), true);
            return response()->json([
                'response' => $response,
            ]);
        }
    }
}
