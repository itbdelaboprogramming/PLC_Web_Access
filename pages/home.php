<div class="h-full flex-1 bg-blue-950 pl-[3.5rem]">
  <div id="header" class="text-center bg-slate-950 py-4">
    <h1 class="mx-auto text-nowrap font-bold text-xl text-white ">
      Main page
    </h1>
  </div>
  <div id="content" class=" bg-blue-950 flex flex-row h-full w-full p-6 justify-between">
    <div id="energy-box" class="flex flex-col h-2/5 w-[45%] p-2 border-2 text-white">
      <h2 id="energy-title" class="text-nowrap mx-auto text-center font-semibold ">Energy</h2>
      <table class="h-full text-lg">
        <tr>
          <td>
            Voltage:
          </td>
          <td class=" text-right">
            <span id="volt">000.00 V</span>
          </td>
        </tr>
        <tr>
          <td>
            Current:
          </td>
          <td class=" text-right">
            <span id="current">000 mA</span>
          </td>
        </tr>
        <tr>
          <td>
            Apparent Energy:
          </td>
          <td class=" text-right">
            <span id="energy">000 mA</span>
          </td>
        </tr>
      </table>
    </div>
    <div id="lamp" class="flex flex-col h-2/5 w-[45%] p-2 border-2 text-white">
      <h2 id="energy-title" class="text-nowrap mx-auto text-center font-semibold ">Lamp Control</h2>
      <div id="lamp-control" class="mx-auto w-full flex flex-row justify-around my-auto">
        <div>
          <button id="green-lamp" class="size-11/12 m-auto">
            <svg id="green-lamp-disp" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-full m-auto fill-green-800">
              <path d="M12 .75a8.25 8.25 0 0 0-4.135 15.39c.686.398 1.115 1.008 1.134 1.623a.75.75 0 0 0 .577.706c.352.083.71.148 1.074.195.323.041.6-.218.6-.544v-4.661a6.714 6.714 0 0 1-.937-.171.75.75 0 1 1 .374-1.453 5.261 5.261 0 0 0 2.626 0 .75.75 0 1 1 .374 1.452 6.712 6.712 0 0 1-.937.172v4.66c0 .327.277.586.6.545.364-.047.722-.112 1.074-.195a.75.75 0 0 0 .577-.706c.02-.615.448-1.225 1.134-1.623A8.25 8.25 0 0 0 12 .75Z" />
              <path fill-rule="evenodd" d="M9.013 19.9a.75.75 0 0 1 .877-.597 11.319 11.319 0 0 0 4.22 0 .75.75 0 1 1 .28 1.473 12.819 12.819 0 0 1-4.78 0 .75.75 0 0 1-.597-.876ZM9.754 22.344a.75.75 0 0 1 .824-.668 13.682 13.682 0 0 0 2.844 0 .75.75 0 1 1 .156 1.492 15.156 15.156 0 0 1-3.156 0 .75.75 0 0 1-.668-.824Z" clip-rule="evenodd" />
            </svg>
          </button>
        </div>
        <div>
          <button id="yellow-lamp" class="size-11/12 m-auto">
            <svg id="yellow-lamp-disp" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-full m-auto fill-orange-800">
              <path d="M12 .75a8.25 8.25 0 0 0-4.135 15.39c.686.398 1.115 1.008 1.134 1.623a.75.75 0 0 0 .577.706c.352.083.71.148 1.074.195.323.041.6-.218.6-.544v-4.661a6.714 6.714 0 0 1-.937-.171.75.75 0 1 1 .374-1.453 5.261 5.261 0 0 0 2.626 0 .75.75 0 1 1 .374 1.452 6.712 6.712 0 0 1-.937.172v4.66c0 .327.277.586.6.545.364-.047.722-.112 1.074-.195a.75.75 0 0 0 .577-.706c.02-.615.448-1.225 1.134-1.623A8.25 8.25 0 0 0 12 .75Z" />
              <path fill-rule="evenodd" d="M9.013 19.9a.75.75 0 0 1 .877-.597 11.319 11.319 0 0 0 4.22 0 .75.75 0 1 1 .28 1.473 12.819 12.819 0 0 1-4.78 0 .75.75 0 0 1-.597-.876ZM9.754 22.344a.75.75 0 0 1 .824-.668 13.682 13.682 0 0 0 2.844 0 .75.75 0 1 1 .156 1.492 15.156 15.156 0 0 1-3.156 0 .75.75 0 0 1-.668-.824Z" clip-rule="evenodd" />
            </svg>
          </button>
        </div>
        <div>
          <button id="red-lamp" class="size-11/12 m-auto">
            <svg id="red-lamp-disp" id="red-lamp-disp" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-full m-auto fill-red-800">
              <path d="M12 .75a8.25 8.25 0 0 0-4.135 15.39c.686.398 1.115 1.008 1.134 1.623a.75.75 0 0 0 .577.706c.352.083.71.148 1.074.195.323.041.6-.218.6-.544v-4.661a6.714 6.714 0 0 1-.937-.171.75.75 0 1 1 .374-1.453 5.261 5.261 0 0 0 2.626 0 .75.75 0 1 1 .374 1.452 6.712 6.712 0 0 1-.937.172v4.66c0 .327.277.586.6.545.364-.047.722-.112 1.074-.195a.75.75 0 0 0 .577-.706c.02-.615.448-1.225 1.134-1.623A8.25 8.25 0 0 0 12 .75Z" />
              <path fill-rule="evenodd" d="M9.013 19.9a.75.75 0 0 1 .877-.597 11.319 11.319 0 0 0 4.22 0 .75.75 0 1 1 .28 1.473 12.819 12.819 0 0 1-4.78 0 .75.75 0 0 1-.597-.876ZM9.754 22.344a.75.75 0 0 1 .824-.668 13.682 13.682 0 0 0 2.844 0 .75.75 0 1 1 .156 1.492 15.156 15.156 0 0 1-3.156 0 .75.75 0 0 1-.668-.824Z" clip-rule="evenodd" />
            </svg>
          </button>
        </div>
        <div>
          <button id="blue-lamp" class="size-11/12 m-auto">
            <svg id="blue-lamp-disp" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-full m-auto fill-blue-800">
              <path d="M12 .75a8.25 8.25 0 0 0-4.135 15.39c.686.398 1.115 1.008 1.134 1.623a.75.75 0 0 0 .577.706c.352.083.71.148 1.074.195.323.041.6-.218.6-.544v-4.661a6.714 6.714 0 0 1-.937-.171.75.75 0 1 1 .374-1.453 5.261 5.261 0 0 0 2.626 0 .75.75 0 1 1 .374 1.452 6.712 6.712 0 0 1-.937.172v4.66c0 .327.277.586.6.545.364-.047.722-.112 1.074-.195a.75.75 0 0 0 .577-.706c.02-.615.448-1.225 1.134-1.623A8.25 8.25 0 0 0 12 .75Z" />
              <path fill-rule="evenodd" d="M9.013 19.9a.75.75 0 0 1 .877-.597 11.319 11.319 0 0 0 4.22 0 .75.75 0 1 1 .28 1.473 12.819 12.819 0 0 1-4.78 0 .75.75 0 0 1-.597-.876ZM9.754 22.344a.75.75 0 0 1 .824-.668 13.682 13.682 0 0 0 2.844 0 .75.75 0 1 1 .156 1.492 15.156 15.156 0 0 1-3.156 0 .75.75 0 0 1-.668-.824Z" clip-rule="evenodd" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>




<script>
  function toggleClass(element, className) {
    if (!element.classList.contains(className)) {
      element.classList.add(className);
    } else {
      element.classList.remove(className);
    }
  }

  const greenLamp = document.getElementById("green-lamp");
  const greeLampDisp = document.getElementById("green-lamp-disp");
  const yellowLamp = document.getElementById("yellow-lamp");
  const yellowLampDisp = document.getElementById("yellow-lamp-disp");
  const redLamp = document.getElementById("red-lamp");
  const redLampDisp = document.getElementById("red-lamp-disp");
  const blueLamp = document.getElementById("blue-lamp");
  const blueLampDisp = document.getElementById("blue-lamp-disp");
  const voltDisp = document.getElementById("volt");
  const currentDisp = document.getElementById("current");
  const energyDisp = document.getElementById("energy");

  function lampchange(device, onClass, offClass, state) {
    let check = device.classList.contains(onClass);
    if (check != state) {
      toggleClass(device, onClass);
      toggleClass(device, offClass);
    }

  }

  function sendLamp(lamp) {
    console.log('Sending lamp:', lamp); // Debugging line
    const data = {
      'lamp': lamp
    };
    console.log('JSON to send:', JSON.stringify(data)); // Check the actual JSON string
    fetch("backend/data-acusition/lamp", {
        method: "POST",
        body: JSON.stringify(data),
        headers: {
          "Content-Type": "application/json"
        }
      })
      .then((data) => console.log(data))
      .catch((error) => {
        console.error("Error:", error);
      });
  }

  greenLamp.addEventListener("click", () => {
    sendLamp("green");
  });

  yellowLamp.addEventListener("click", () => {
    sendLamp("yellow");
  });

  redLamp.addEventListener("click", () => {
    sendLamp("red");
  });

  blueLamp.addEventListener("click", () => {
    sendLamp("blue");
  });


  function fetch_energy_data() {
    fetch('backend/data-acusition/fetch_energy_data.php')
      .then(response => response.json())
      .then(data => {
        if (data.error) {
          console.log("data error")
        } else {
          currentDisp.textContent = `${data.current} mA`;
          voltDisp.textContent = `${data.volt / 100} V`;
          energyDisp.textContent = `${data.appEnergy} W`;
        }
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  }

  function fetch_lamp_data() {
    fetch('backend/data-acusition/fetch_lamp_data.php')
      .then(response => response.json())
      .then(data => {
        if (data.error) {
          console.log("data error")
        } else {
          lampchange(greeLampDisp, "fill-green-400", "fill-green-800", data.green);
          lampchange(redLampDisp, "fill-red-400", "fill-red-800", data.red);
          lampchange(yellowLampDisp, "fill-orange-400", "fill-orange-800", data.yellow);
          lampchange(blueLampDisp, "fill-blue-400", "fill-blue-800", data.blue);
          console.log(data);
        }
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  }




  // Fetch data every  400 milliseconds
  setInterval(fetch_energy_data, 400);
  setInterval(fetch_lamp_data, 400);
</script>