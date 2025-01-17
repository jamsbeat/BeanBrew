<div>
  <div class="relative mt-2">
    <button type="button" id="dropdown-button" class="w-full cursor-pointer rounded-md bg-white py-2 pl-3 pr-4 text-left text-gray-900 shadow-md border border-gray-300 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50" onclick="document.getElementById('location-dropdown').classList.toggle('hidden')">
      <span class="block truncate">Select a Location</span>
      <svg class="w-5 h-5 text-gray-500 ml-2 inline-block" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
        <path fill-rule="evenodd" d="M5.22 10.22a.75.75 0 0 1 1.06 0L8 11.94l1.72-1.72a.75.75 0 1 1 1.06 1.06l-2.25 2.25a.75.75 0 0 1-1.06 0l-2.25-2.25a.75.75 0 0 1 0-1.06ZM10.78 5.78a.75.75 0 0 1-1.06 0L8 4.06 6.28 5.78a.75.75 0 0 1-1.06-1.06l2.25-2.25a.75.75 0 0 1 1.06 0l2.25 2.25a.75.75 0 0 1 0 1.06Z" clip-rule="evenodd" />
      </svg>
    </button>

    <ul id="location-dropdown" class="absolute left-0 z-10 hidden mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-2 text-base shadow-lg ring-1 ring-black/5 focus:outline-none sm:text-sm">
      <li class="relative cursor-pointer select-none py-2 px-3 text-gray-900 hover:bg-indigo-100 hover:text-indigo-600" onclick="document.getElementById('dropdown-button').querySelector('span').textContent = 'Select location'; document.getElementById('location-dropdown').classList.add('hidden');">
        <span class="block truncate">Unselect</span>
      </li>
      <li class="relative cursor-pointer select-none py-2 px-3 text-gray-900 hover:bg-indigo-100 hover:text-indigo-600" onclick="document.getElementById('dropdown-button').querySelector('span').textContent = 'Harrogate'; document.getElementById('location-dropdown').classList.add('hidden'); document.getElementById('date-picker').classList.remove('hidden'); document.getElementById('time-picker').classList.remove('hidden');">
        <span class="block truncate">Harrogate</span>
      </li>
      <li class="relative cursor-pointer select-none py-2 px-3 text-gray-900 hover:bg-indigo-100 hover:text-indigo-600" onclick="document.getElementById('dropdown-button').querySelector('span').textContent = 'Sheffield'; document.getElementById('location-dropdown').classList.add('hidden'); document.getElementById('date-picker').classList.remove('hidden'); document.getElementById('time-picker').classList.remove('hidden');">
        <span class="block truncate">Sheffield</span>
      </li>
      <li class="relative cursor-pointer select-none py-2 px-3 text-gray-900 hover:bg-indigo-100 hover:text-indigo-600" onclick="document.getElementById('dropdown-button').querySelector('span').textContent = 'Leeds'; document.getElementById('location-dropdown').classList.add('hidden'); document.getElementById('date-picker').classList.remove('hidden'); document.getElementById('time-picker').classList.remove('hidden');">
        <span class="block truncate">Leeds</span>
      </li>
    </ul>
  </div>

  <div id="date-picker" class="mt-4 hidden">
    <input type="date" id="selected-date" class="block w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600" min="" onchange="if(this.value && document.getElementById('selected-time').value) { document.getElementById('summary-location').textContent = 'Location: ' + document.getElementById('dropdown-button').querySelector('span').textContent; document.getElementById('summary-date').textContent = 'Date: ' + this.value; document.getElementById('summary-time').textContent = 'Time: ' + document.getElementById('selected-time').value; document.getElementById('booking-info').classList.remove('hidden'); document.getElementById('book-button-container').classList.remove('hidden'); }">
  </div>

  <div id="time-picker" class="mt-4 hidden">
    <select id="selected-time" class="block w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600" onchange="if(document.getElementById('selected-date').value && this.value) { document.getElementById('summary-location').textContent = 'Location: ' + document.getElementById('dropdown-button').querySelector('span').textContent; document.getElementById('summary-date').textContent = 'Date: ' + document.getElementById('selected-date').value; document.getElementById('summary-time').textContent = 'Time: ' + this.value; document.getElementById('booking-info').classList.remove('hidden'); document.getElementById('book-button-container').classList.remove('hidden'); }">
      <option value="" disabled selected>Select a Time</option>
      <option value="12:00 PM">12:00 PM</option>
      <option value="12:30 PM">12:30 PM</option>
      <option value="1:00 PM">1:00 PM</option>
      <option value="1:30 PM">1:30 PM</option>
      <option value="2:00 PM">2:00 PM</option>
      <option value="2:30 PM">2:30 PM</option>
    </select>
  </div>

  <div id="booking-info" class="mt-4 hidden">
    <h3 class="text-xl font-semibold">Booking Summary</h3>
    <p id="summary-location"></p>
    <p id="summary-date"></p>
    <p id="summary-time"></p>
  </div>

  <div id="book-button-container" class="mt-4 hidden">
    @auth
    <button id="book-button" class="w-full py-2 px-4 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600" onclick="alert('Your table has been booked!'); document.getElementById('dropdown-button').querySelector('span').textContent = 'Select a Location'; document.getElementById('selected-date').value = ''; document.getElementById('selected-time').value = ''; document.getElementById('location-dropdown').classList.add('hidden'); document.getElementById('date-picker').classList.add('hidden'); document.getElementById('time-picker').classList.add('hidden'); document.getElementById('booking-info').classList.add('hidden'); document.getElementById('book-button-container').classList.add('hidden');">
      Book
    </button>
    @endauth
    @guest
    <p>Please Login or register to book</p>
    @endguest
  </div>
</div>

<script>
  document.getElementById('selected-date').setAttribute('min', new Date().toISOString().split('T')[0]);
</script>
