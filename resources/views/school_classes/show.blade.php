<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-4 lg:px-4 mt-4">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">

            <h2>{{ $school_class->name }}</h2>
            <h3>StudyPlan : {{ $school_class->study_plan_id }}</h3>
            <h3>Listes des élèves :</h3>
            @include('school_classes.list', ['students' => $school_class->students])
        </div>
    </div>
</x-app-layout>