<div class="hero__categories">
    <div class="hero__categories__all">
        <i class="fa fa-bars"></i>
        <span>All Categories</span>
    </div>
    <ul>
        @unless (count($categories) > 0)
            <li>No categories</li>
        @else
            @foreach ($categories as $category)
                <li wire:click="$parent.setCategory({{ $category }})">{{ $category->name }}</li>
            @endforeach
        @endunless
    </ul>
</div>
