function filterData() {
    // var type = document.getElementById("type-select").value;
    var minFrom = document.getElementById("minuteFrom").value;
    var minTo = document.getElementById("minuteTo").value;
    console.log(minFrom);
    // Envoie les paramètres de filtrage au serveur PHP pour obtenir les données filtrées
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          var resultContainer = document.getElementById("result-container");
          resultContainer.innerHTML = xhr.responseText;
        } else {
          console.error("Erreur lors de la récupération des données filtrées : " + xhr.status);
        }
      }
    };
    // URL du script PHP qui récupère les données filtrées depuis la base de données    
    var url = "filter.php?minuteFrom=" + encodeURIComponent(minFrom) + "&minuteTo=" + encodeURIComponent(minTo);
    xhr.open("GET", url, true);
    xhr.send();
  }
  
  function updateRangeValue(rangeId, numberId) {
    const rangeInput = document.getElementById(rangeId)
    const numberInput = document.getElementById(numberId)
    
    rangeInput.style.backgroundSize = (rangeInput.value - rangeInput.min) * 100 / (rangeInput.max - rangeInput.min) + '% 100%'
    numberInput.value = rangeInput.value
  }
  
  function updateNumberValue(numberId, rangeId) {
    const numberInput = document.getElementById(numberId)
    const rangeInput = document.getElementById(rangeId)
    
    if (numberInput.value < rangeInput.min) {
      numberInput.value = rangeInput.min
    } else if (numberInput.value > rangeInput.max) {
      numberInput.value = rangeInput.max
    }
    
    rangeInput.value = numberInput.value
    rangeInput.style.backgroundSize = (rangeInput.value - rangeInput.min) * 100 / (rangeInput.max - rangeInput.min) + '% 100%'
  }
  
  const rangeInputs = document.querySelectorAll('input[type="range"]')
  const numberInputs = document.querySelectorAll('input[type="number"]')
  
  rangeInputs.forEach(input => {
    input.addEventListener('input', () => {
      updateRangeValue(input.id, input.nextElementSibling.id)
    })
  })
  
  numberInputs.forEach(input => {
    input.addEventListener('input', () => {
      updateNumberValue(input.id, input.previousElementSibling.id)
    })
  })
  