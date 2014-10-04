<div class="list-group">
  <a href="{{ URL::to('admin/blogs') }}" class="list-group-item {{ (Route::current()->getPrefix() == 'admin/blogs') ? 'active' : '' }}">Post Management</a>
  <a href="{{ URL::to('admin/comments') }}" class="list-group-item {{ (Route::current()->getPrefix() == 'admin/comments') ? 'active' : '' }}">Comment Management</a>
  <a href="{{ URL::to('admin/users') }}" class="list-group-item {{ (Route::current()->getPrefix() == 'admin/users') ? 'active' : '' }}">User Management</a>
  <a href="{{ URL::to('admin/roles') }}" class="list-group-item {{ (Route::current()->getPrefix() == 'admin/roles') ? 'active' : '' }}">Role Management</a>
</div>
