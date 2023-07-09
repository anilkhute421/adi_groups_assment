<div>
    <h2>Teacher Filter</h2>
    <form wire:submit.prevent="render">
        <div>
            <label for="teacherMinSalary">Min Salary:</label>
            <input type="number" id="teacherMinSalary" wire:model="teacherMinSalary" />
        </div>
        <div>
            <label for="teacherMaxSalary">Max Salary:</label>
            <input type="number" id="teacherMaxSalary" wire:model="teacherMaxSalary" />
        </div>
        <button type="submit">Filter Teachers</button>
    </form>

    <h2>Student Filter</h2>
    <form wire:submit.prevent="render">
        <div>
            <label for="studentMinMarks">Min Marks:</label>
            <input type="number" id="studentMinMarks" wire:model="studentMinMarks" />
        </div>
        <div>
            <label for="studentMaxMarks">Max Marks:</label>
            <input type="number" id="studentMaxMarks" wire:model="studentMaxMarks" />
        </div>
        <button type="submit">Filter Students</button>
    </form>

    <h2>Filtered Teachers</h2>
    @if($teachers->isEmpty())
        <h5>No Teachers Found</h5>
    @else
        <ul>
            @foreach($teachers as $teacher)
                <li>{{ $teacher->teacherName }} ({{ $teacher->school->schoolName }})</li>
            @endforeach
        </ul>
    @endif

    <h2>Filtered Students</h2>
    @if($students->isEmpty())
        <h5>No Students Found</h5>
    @else
        <ul>
            @foreach($students as $student)
                <li>{{ $student->studentName }} ({{ $student->school->schoolName }})</li>
            @endforeach
        </ul>
    @endif
</div>
