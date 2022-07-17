<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class LogJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    public string $RunJob = __CLASS__;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        Log::info('--------------------------请求日志队列开始--------------------------');
        Log::info('队列名称:'.$this->RunJob);
        Log::info('请求地址:'.$this->data['url']);
        Log::info('请求方式:'.$this->data['method']);
        Log::info('请求参数:'.json_encode($this->data['request'], JSON_UNESCAPED_UNICODE));
        Log::info('返回结果:'.json_encode($this->data['response'], JSON_UNESCAPED_UNICODE));
        Log::info('运行时长:'.$this->data['time']);
        Log::info('--------------------------请求日志队列结束--------------------------');
        Log::info('');
    }
}
