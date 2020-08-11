# **購物車網站**

<p style=font-size:30px>laravel版本: 5.8.4</p>

---
<p style=font-size:30px>
如何安裝:
</p>

```=javascript
1. git clone 
2. cp .ev.example .ev
3. docker-compose up -d --build site
4. docker-compose run --rm composer install
5. docker-compose run --rm artisan key:generate
6. docker-compose run --rm artisan migrate
7. docker-compose run --rm artisan db:seed
8. Open browser 127.0.0.1

```

---
<span style=font-size:30px>
功能:
    <ul style='list-style-type:upper-roman;font-size:20px'> 
      <li>登入登出註冊功能</li>
      <li>MiddleWare Auth驗證</li> 
      <li>物品購買</li>
      <li>物品結帳使用Stripe 信用卡支付(測試模式)</li> 
    </ul>
</span>
