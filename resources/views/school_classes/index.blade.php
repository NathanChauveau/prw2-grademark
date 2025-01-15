<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-4 lg:px-4 mt-4">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">

            <h2>School Classes</h2>

            <ul>
                @foreach ($school_classes as $school_class)
                <li>
                    <a href="{{ route('school_classes.show', $school_class) }}">{{ $school_class->name }}</a>
                </li>
                @endforeach
            </ul>

        </div>
    </div>
</x-app-layout>