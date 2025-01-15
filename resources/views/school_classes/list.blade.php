@if ($students->isNotEmpty())
<ul>
    @foreach ($students as $student)
    <li>
        <h3>{{ $student->name }}</h3>
    </li>
    @endforeach
</ul>
@else
<p>Il n'y a pas d'élève dans cette classe.</p>
@endif