<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <title>Barangay Landing Page</title>
</head>
<body  style="background-color:#f9f9f9 !important">
    <div class="hero-section">
        <h1>Sitio Igiban</h1>
        <h2>Barangay Sta. Cruz Antipolo City</h2>
    </div>
    <div class="main-content">
        <div class="left-column">
            <img src="https://stacruzantipolocity.weebly.com/uploads/5/0/8/8/50886061/header_images/1429101212.jpg" alt="Community Image">
        </div>
        <div class="right-column" style="">
  
  <div style="border: 1px solid #ecebeb;/* margin-top: 10px; */padding: 10px;padding: 0;">
    <h3 style="margin: 0;background-color: #333;color: #fff;font-size: 20px;padding: 17px;border-radius: 0;">Location</h3>
    <p style="margin: 25px;color: #333;font-size: 16px;">
      Barangay Sta. Cruz is located in the northern part of Antipolo City, Rizal. It is bounded by Barangay Mayamot on the east, Barangay San Jose on the south, Barangay Cupang on the west, and Barangay Santa Cecilia on the north.
    </p>
  </div>
  <div style="border: 1px solid #fff;margin-top: 10px;/* padding: 10px; */border: 1px solid #ecebeb;/* margin-top: 10px; *//* padding: 10px; */padding: 0;">
    <h4 style="/* background-color: #333; *//* color: #fff; *//* font-size: 18px; *//* padding: 5px; *//* border-radius: 5px; */margin: 0;background-color: #333;color: #fff;font-size: 20px;padding: 17px;border-radius: 0;">About Us</h4>
    <ul style="margin: 25px;color: #333;font-size: 16px;margin-left: 20px;">
      <li style="
    padding-top: 10px;
">Barangay Sta. Cruz is a vibrant and growing community located in Antipolo City, Rizal.</li>
      <li style="
    padding-top: 10px;
">The barangay is home to a diverse population of around 17,000 residents, who are mostly engaged in agriculture and small-scale businesses.</li>
      <li style="
    padding-top: 10px;
">The community is known for its rich cultural heritage, natural beauty, and warm hospitality, making it a popular destination for visitors and tourists.</li>
    </ul>
  </div>
</div>
    </div>
    <div class="additional-content">
        <div class="card">
            <img src="https://cdn-icons-png.flaticon.com/512/2633/2633072.png" alt="Thumbnail">
            <h5>History</h5>
            <p>Barangay Sta. Cruz has a long and fascinating history that dates back to the Spanish colonial period. The area was originally settled by the native Tagalog people, who were later converted to Christianity by the Spanish missionaries.</p>
        </div>
        <div class="card">
            <img src="https://cdn-icons-png.flaticon.com/512/96/96648.png" alt="Thumbnail">
            <h5>Features</h5>
            <p>Barangay Sta. Cruz is known for its natural beauty and scenic attractions, including the Hinulugang Taktak National Park, which features a waterfall and natural pools that are popular with visitors and locals alike.</p>
        </div>
        <div class="card">
            <img src="https://t3.ftcdn.net/jpg/04/09/84/74/360_F_409847498_k9QDG9pOJ8FPT9LM7iQSfCTiAoLaaFvA.jpg" alt="Thumbnail">
            <h5>Environment</h5>
            <p>The barangay is committed to preserving its natural environment and promoting sustainable development. It has implemented various initiatives to reduce waste, conserve water, and protect its natural resources.</p>
        </div>
    </div>
</body>
</html>
<script>
  const imageUrlFetchURL = 'controller/homeCarousel.php';

// DOM element for the hero section
const heroSection = document.querySelector('.hero-section');

// Function to update the background image of the hero section
function updateBackgroundImage(imageUrls) {
    let currentIndex = 0;

    setInterval(() => {
        // Change the background image../public/image/Gallery_20230530165523.jpg
        heroSection.style.backgroundImage = `url(../public/image/${imageUrls[currentIndex]})`;
      alert(heroSection.style.backgroundImage);
        // Increment the index, and loop back to the beginning if needed
        currentIndex = (currentIndex + 1) % imageUrls.length;
    }, 5000); // Change image every 5 seconds
}

// Fetch image URLs using AJAX
fetch(imageUrlFetchURL)
    .then((response) => response.json())
    .then((data) => {
        // Check if there are image URLs
        if (data.length > 0) {
            updateBackgroundImage(data);
        } else {
            console.error('No image URLs found in the database.');
        }
    })
    .catch((error) => {
        console.error('Error fetching image URLs:', error);
    });
    </script>