<!-- sidebar component -->
<nav id="sidebar">
    <div class="sidebar-header">
        <img src='/assets/img/Dose.png' width="90px"> <b>dose v1.0.0</b>    
    </div>
    <ul class="list-unstyled components">
        <p>the lowercase dose tracker</p>
        <li class="active">
            <a href="/"><i class="fas fa-list"></i> overview</a>
        </li>
        <li>
            <a href="/add"><i class="fas fa-add"></i> add new entry</a>
        </li>
        {{if $current_user.login eq 'root'}}
        <li>
            <a href="/users"><i class="fas fa-cog fa-spin"></i> manage users</a>
        </li>
        <li>
            <a href="/user/add"><i class="fas fa-user-plus"></i> add new user</a>
        </li>
        {{/if}}
    </ul>

    <ul class="list-unstyled CTAs sidebar-footer">
        <li>
          <p>you're logged in as <b>{{$current_user.login}}</b></p>
        </li>
        <li>
            <a href="/exit" class="btn btn-danger"><i class="fas fa-right-from-bracket"></i> log out</a>
        </li>
    </ul>
</nav>

