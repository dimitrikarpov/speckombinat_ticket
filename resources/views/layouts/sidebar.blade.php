<ul class="nav nav-sidebar">
    <li {{ Route::current()->uri == 'home/{tab}' || Route::current()->uri == 'home' ? 'class=active':'' }}><a href="/home">Заявки</a></li>
    <li {{ Route::current()->uri == 'dashboard' ? 'class=active':''}}><a href="/dashboard">Мои</a></li>
    <li {{ Route::current()->uri == 'ticket/add' ? 'class=active':''}}><a href="/ticket/add">Создать</a></li>
    <li {{ Route::current()->uri == 'tickets' ? 'class=active':''}}><a href="/tickets">Архив</a></li>
</ul>
<ul class="nav nav-sidebar">
    <li {{ Route::current()->uri == 'categories' ? 'class=active':''}}><a href="/category">Категории</a></li>
    <li {{ Route::current()->uri == 'user' ? 'class=active':''}}><a href="/user">Пользователи</a></li>
</ul>
