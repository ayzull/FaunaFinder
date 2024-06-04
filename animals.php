<?php
require 'inc/sess.php';
require 'inc/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fauna Finder</title>
  <link rel='stylesheet' type='text/css' media='screen' href='css/Animals-page/animals.css'>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/517cf10de6.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php
  require 'inc/header.php';
  $sql = "SELECT * FROM animal";
  $result = mysqli_query($conn, $sql);
  ?>

  <main>
    <section>
      <h2>
        <img src="image/Animals-page/h2-chick.png" style="height: 35px; position: absolute; top: 22%; left: 36%;"
          alt="Chick">
        FIND YOUR ANIMALS HERE!
      </h2>
      <button id="snap" onclick="handleSnapButton()">
        <img src="image/Animals-page/camera.png" alt="camera">
        <span>Insert a clear picture to use AI features</span>
      </button><br>
      <form class="searchcontainer">
        <input type="text" placeholder="Search animal..." id="searchInput" name="search" oninput="searchAnimals()">
        <button type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>
      <center>
        <p id="prediction"></p>
      </center>
      <div class="animal-list" id="animalList">

        <?php
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            ?>
            <div class="animal-item">
              <img src="image/upload/<?php echo $row['image']; ?>" loading="lazy" alt="Cat">
              <div class="animal-info">
                <h2>
                  <?php echo $row['name']; ?>
                </h2>
                <p>
                  Scientific Name:
                  <?php echo $row['scientific_name']; ?><br>
                  Gestation Period:
                  <?php echo $row['gestation_period']; ?><br>
                  Country of Origin:
                  <?php echo $row['country_origin']; ?><br>
                  Habitat:
                  <?php echo $row['habitat']; ?><br>
                  Food:
                  <?php echo $row['food']; ?><br>
                  Fun Fact:
                  <?php echo $row['fun_fact']; ?>
                </p>
              </div>
            </div>
            <?php
          }
        }
        ?>
      </div>
    </section>
  </main>

  <?php
  require 'inc/footer.php';
  ?>

  <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@1.0.1"></script>
  <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/mobilenet@1.0.0"></script>


  <script>
    const snapButton = document.getElementById('snap');
    const searchInput = document.getElementById('searchInput');
    const animalList = document.getElementById('animalList');
    const prediction = document.getElementById('prediction');
    let model;

    snapButton.onclick = () => {
      const fileInput = document.createElement('input');
      fileInput.type = 'file';
      fileInput.accept = 'image/*';
      fileInput.capture = 'environment';
      fileInput.onchange = (event) => {
        const file = event.target.files[0];
        classifyImage(file);
      };
      fileInput.click();
    };

    async function classifyImage(file) {
      const img = document.createElement('img');
      const imgUrl = URL.createObjectURL(file);
      img.onload = () => {
        URL.revokeObjectURL(imgUrl);
        classify(img);
      };
      img.src = imgUrl;
    }

    async function classify(img) {
      if (!model) {
        model = await mobilenet.load();
      }

      showLoading();

      const predictions = await model.classify(img);
      const topPrediction = predictions[0].className;
      searchInput.value = topPrediction;
      searchAnimals();
      showPrediction(topPrediction);
    }

    function showLoading() {
      prediction.innerText = 'Loading...';
    }

    function showPrediction(predictedClass) {
      prediction.innerText = `This might be a ${predictedClass}`;
    }

    function searchAnimals() {
      const input = searchInput.value.toLowerCase();
      const animals = animalList.getElementsByClassName('animal-item');
      const queryWords = input.split(',');

      for (let i = 0; i < animals.length; i++) {
        const animal = animals[i];
        const name = animal.getElementsByTagName('h2')[0].innerText.toLowerCase();
        let showAnimal = false;

        for (let j = 0; j < queryWords.length; j++) {
          const queryWord = queryWords[j];
          if (name.includes(queryWord)) {
            showAnimal = true;
            break;
          }
        }

        if (showAnimal) {
          animal.style.display = 'flex';
        } else {
          animal.style.display = 'none';
        }
      }
    }
  </script>
</body>

</html>