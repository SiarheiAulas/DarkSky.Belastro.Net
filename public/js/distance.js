document.getElementById('filter-form').addEventListener('submit', function(event) {
  event.preventDefault();
  
  const form = document.getElementById('filter-form');
  const user_lat = document.getElementById('user_lat');
  const user_long = document.getElementById('user_long');
  
  if (!navigator.geolocation) {
      user_lat.value = 53.9;
      user_long.value = 27.5667;    
      form.submit();
    return;
  }

  navigator.geolocation.getCurrentPosition(
    function(position) {
      user_lat.value = position.coords.latitude;
      user_long.value = position.coords.longitude;
      form.submit();
    },
    function(error) {
      user_lat.value = 53.9;
      user_long.value = 27.5667;
      form.submit();
    }
  );
});