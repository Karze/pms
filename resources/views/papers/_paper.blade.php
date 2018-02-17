<li>
    <img src="#" alt="{{ $paper->name }}" class="gravatar"/>
    <a href="{{ route('papers.show', $paper->id )}}" class="title">{{ $paper->title }}</a>

    @can('destroy', $paper)
        <form action="{{ route('papers.destroy', $user->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-sm btn-danger delete-btn">删除</button>
        </form>
    @endcan
</li>