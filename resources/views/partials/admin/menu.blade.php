<aside class="menu">
  <p class="menu-label">
    General
  </p>
  <ul class="menu-list">
    <li><a href="{{ url('/admin') }}" class="is-active">Dashboard</a></li>
  </ul>
  <p class="menu-label">
    Administration
  </p>
  <ul class="menu-list">
    <li><a>Site Settings</a></li>
    <li>
      <a href="{{ url('/admin/property') }}">Manage Properties</a>
      <ul>
        <li><a href="{{ url('/admin/property') }}">Properties</a></li>
        <li><a>New Property</a></li>
      </ul>
    </li>
    <li>
      <a>Manage Agents</a>
      <ul>
        <li><a>Agents</a></li>
        <li><a>New Agent</a></li>
      </ul>
    </li>
  </ul>
</aside>
