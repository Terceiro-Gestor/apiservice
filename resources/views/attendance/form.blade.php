<div class="space-y-6">
    
    <div>
        <x-input-label for="people_id" :value="__('People Id')"/>
        <x-text-input id="people_id" name="people_id" type="text" class="mt-1 block w-full" :value="old('people_id', $attendance?->people_id)" autocomplete="people_id" placeholder="People Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('people_id')"/>
    </div>
    <div>
        <x-input-label for="register_id" :value="__('Register Id')"/>
        <x-text-input id="register_id" name="register_id" type="text" class="mt-1 block w-full" :value="old('register_id', $attendance?->register_id)" autocomplete="register_id" placeholder="Register Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('register_id')"/>
    </div>
    <div>
        <x-input-label for="employee_id" :value="__('Employee Id')"/>
        <x-text-input id="employee_id" name="employee_id" type="text" class="mt-1 block w-full" :value="old('employee_id', $attendance?->employee_id)" autocomplete="employee_id" placeholder="Employee Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('employee_id')"/>
    </div>
    <div>
        <x-input-label for="service_type" :value="__('Service Type')"/>
        <x-text-input id="service_type" name="service_type" type="text" class="mt-1 block w-full" :value="old('service_type', $attendance?->service_type)" autocomplete="service_type" placeholder="Service Type"/>
        <x-input-error class="mt-2" :messages="$errors->get('service_type')"/>
    </div>
    <div>
        <x-input-label for="attendance_type" :value="__('Attendance Type')"/>
        <x-text-input id="attendance_type" name="attendance_type" type="text" class="mt-1 block w-full" :value="old('attendance_type', $attendance?->attendance_type)" autocomplete="attendance_type" placeholder="Attendance Type"/>
        <x-input-error class="mt-2" :messages="$errors->get('attendance_type')"/>
    </div>
    <div>
        <x-input-label for="attendance_date" :value="__('Attendance Date')"/>
        <x-text-input id="attendance_date" name="attendance_date" type="text" class="mt-1 block w-full" :value="old('attendance_date', $attendance?->attendance_date)" autocomplete="attendance_date" placeholder="Attendance Date"/>
        <x-input-error class="mt-2" :messages="$errors->get('attendance_date')"/>
    </div>
    <div>
        <x-input-label for="start_time" :value="__('Start Time')"/>
        <x-text-input id="start_time" name="start_time" type="text" class="mt-1 block w-full" :value="old('start_time', $attendance?->start_time)" autocomplete="start_time" placeholder="Start Time"/>
        <x-input-error class="mt-2" :messages="$errors->get('start_time')"/>
    </div>
    <div>
        <x-input-label for="end_time" :value="__('End Time')"/>
        <x-text-input id="end_time" name="end_time" type="text" class="mt-1 block w-full" :value="old('end_time', $attendance?->end_time)" autocomplete="end_time" placeholder="End Time"/>
        <x-input-error class="mt-2" :messages="$errors->get('end_time')"/>
    </div>
    <div>
        <x-input-label for="notes" :value="__('Notes')"/>
        <x-text-input id="notes" name="notes" type="text" class="mt-1 block w-full" :value="old('notes', $attendance?->notes)" autocomplete="notes" placeholder="Notes"/>
        <x-input-error class="mt-2" :messages="$errors->get('notes')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>