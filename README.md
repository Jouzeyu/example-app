## 开发日志

------

### 20220717日志详情

#### 主题：

通过中间件的方式将请求记录记录到log日志中。

#### 详细说明

- 安装predis拓展包，代替phpredis拓展，优势是不用因为后续修复php版本而另外解决拓展不兼容问题；
- 将默认队列驱动由sync变为redis；
- 新增RequestLogMiddleware中间件，拓展LogJob任务类；

#### 涉及命令

```shell
php artisan queue:work redis #需要运行队列命令
```

```php
REDIS_CLIENT=predis //.env中需要添加
```

#### 优化不足

- 日志无法按照时间日志区分；
- 请求日志需要和报错，警告类型的日志分离；

