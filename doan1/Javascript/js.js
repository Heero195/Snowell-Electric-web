    // Check if the page count exists in localStorage
  let pageCount = localStorage.getItem('pageCount');

   // If it doesn't exist, initialize its
  if (!pageCount) {
    pageCount = 0;
  } else {
    pageCount = parseInt(pageCount);
  }
// Increment the count
pageCount++;
   // Update the visitor count in localStorage
  localStorage.setItem('pageCount', pageCount);

  // Display the updated count
  document.getElementById('pageview-count').textContent = pageCount;
  const tickerContent = document.getElementById('tickerContent');

  function updateTicker(location) {
    const now = new Date();
    const date = now.toLocaleDateString();
    const time = now.toLocaleTimeString();
  
    tickerContent.innerHTML = `Date: ${date} | Time: ${time} | Location: ${location}`;
  }
  
  function fetchLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const { latitude, longitude } = position.coords;
  
          fetch(`https://geocode.maps.co/reverse?lat=${latitude}&lon=${longitude}`)
            .then((response) => response.json())
            .then((data) => {
              const location = data.address.city || data.address.state || 'Unknown Location';
              setInterval(() => updateTicker(location), 1000);
            })
            .catch(() => {
              setInterval(() => updateTicker('Unable to retrieve location'), 1000);
            });
        },
        () => {
          setInterval(() => updateTicker('Location access denied'), 1000);
        }
      );
    } else {
      setInterval(() => updateTicker('Geolocation not supported'), 1000);
    }
  }
  
  fetchLocation();
  