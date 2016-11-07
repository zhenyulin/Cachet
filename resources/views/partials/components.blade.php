@if($component_groups->isNotEmpty())
@foreach($component_groups as $componentGroup)
<ul class="components-group">
    @if($componentGroup->enabled_components->isNotEmpty())
    <li class="components-group__name group-name">
        <i class="ion ion-ios-circle-filled text-component-{{ $componentGroup->lowest_status }} {{ $componentGroup->lowest_status_color }}" data-toggle="tooltip" title="{{ $componentGroup->lowest_human_status }}"></i>
        <strong>{{ $componentGroup->name }}</strong>

        <div class="pull-right">
            <i class="{{ $componentGroup->collapse_class }} group-toggle"></i>
        </div>
    </li>

    <div class="group-items {{ $componentGroup->is_collapsed ? "hide" : null }}">
        @each('partials.component', $componentGroup->enabled_components()->orderBy('order')->get(), 'component')
    </div>
    @endif
</ul>
@endforeach
@endif

@if($ungrouped_components->isNotEmpty())
<ul class="components-group">
    <li class="components-group__name"><strong>{{ trans('cachet.components.group.other') }}</strong></li>
    @foreach($ungrouped_components as $component)
    @include('partials.component', compact($component))
    @endforeach
</ul>
@endif
