<!-- resources/views/students/edit.blade.php -->
<form action="{{ route('students.update', $student->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="ru">RU:</label>
    <input type="text" id="ru" name="ru" value="{{ $student->ru }}" required>

    <label for="firstName">First Name:</label>
    <input type="text" id="firstName" name="firstName" value="{{ $student->firstName }}" required>

    <label for="lastName">Last Name:</label>
    <input type="text" id="lastName" name="lastName" value="{{ $student->lastName }}" required>

    <button type="submit">Actualizar</button>
</form>
