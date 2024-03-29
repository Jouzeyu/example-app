## 开发日志

------

### 20220717开发详情

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

#### 主题：

通过laravel pint 拓展包格式化代码。

#### 详细说明

- 安装pint拓展包，代替繁琐的PHP-CS-FIXEER；

#### 涉及命令

```shell
./vendor/bin/pint #需要运行命令才能格式化
```

#### 优化不足

- 每次需要操作一步，感觉有点麻烦；

### 20220718开发详情

#### 主题：

更改了部分记录日志内容。

#### 详细说明

- 增加了请求ip地址、header头及请求用户id；

#### 主题：

统一规范api响应格式，处理返回异常。

#### 详细说明

- 安装laravel-response拓展包；
- App\Exceptions\Handler中增加了异常处理方法；

#### 涉及命令

```php
use Jiannei\Response\Laravel\Support\Facades\Response;

Response::success(['data' => 'success']);
```

#### 优化不足

- 首次尝试；

#### 主题：

本地化处理。

#### 详细说明

- 安装overtrue/laravel-lang拓展包；
- 更改语言为中文；

### 20220719开发详情

#### 主题：

添加了查询生成器。

#### 详细说明

- 安装spatie/laravel-query-builder拓展包；

#### 优化不足

- 首次尝试；

### 20220801开发详情

#### 主题：

添加了基于雪花算法的id生成器。

#### 详细说明

- 安装godruoyi/php-snowflake拓展包；
- 创建了模型基类；

#### 注意事项
- model基类中默认隐藏了id字段，并更改路由检索值为雪花算法id，如果有其他的隐藏至，需重写并添加id字段；
- 调用雪花算法id为 app('snowflake')->id()
#### 优化不足

- 首次尝试；
