<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-4 lg:px-4 mt-4">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">

            <h2>Nouvelle classe</h2>

            <form action="{{ route('school_classes.store') }}" method="post">
                @csrf
                <label for="name">Nom:</label>
                <input name="name" id="name" value="" class="@error('name') is-invalid @enderror">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
                <label for="study_plan_id">Plan d'études:</label>
                <select name="study_plan_id">
                    @foreach ($study_plans as $study_plan)
                    <option value="{{ $study_plan->id }}">{{ $study_plan->name }}</option>
                    @endforeach
                </select>
                <br>
                <button>Ajouter</button>
            </form>

        </div>
    </div>
</x-app-layout>