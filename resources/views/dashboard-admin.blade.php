<x-layout-admin>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

  <x-slot:title>{{ $title }}</x-slot:title>
  <div class="">
      <div class="grid grid-cols-4 gap-4">
        <div class="bg-green-700 p-4 text-white rounded-lg">
          <div class="text-5xl mb-4">
              <i class="fa-solid fa-book"></i>
          </div>
          <div class="text-4xl">{{ $book }}</div>
          <hr class="border-b my-4">
          <div class="text-xl font-bold float-end">Total Buku</div>
      </div>
      <div class="bg-red-700 p-4 text-white rounded-lg">
          <div class="text-5xl mb-4">
              <i class="fa-solid fa-book"></i>
          </div>
          <div class="text-4xl">{{ $user }}</div>
          <hr class="border-b my-4">
          <div class="text-xl font-bold float-end">Total User</div>
      </div>
      <div class="bg-yellow-700 p-4 text-white rounded-lg">
          <div class="text-5xl mb-4">
              <i class="fa-solid fa-book"></i>
          </div>
          <div class="text-4xl">{{ $borrow }}</div>
          <hr class="border-b my-4">
          <div class="text-xl font-bold float-end">Total Buku Yang Dipinjam</div>
      </div>
      <div class="bg-cyan-700 p-4 text-white rounded-lg">
          <div class="text-5xl mb-4">
              <i class="fa-solid fa-book"></i>
          </div>
          <div class="text-4xl">{{ $kembali }}</div>
          <hr class="border-b my-4">
          <div class="text-xl font-bold float-end">Total Buku Yang Dikembalikan</div>
      </div>
      </div>
      <div class="border mt-5">
          <div id="chart"></div>
      </div>
  </div>
  <script>
    var options = {
        chart: {
            height: 280,
            type: "area"
        },
        dataLabels: {
            enabled: false
        },
        series: [{
            name: "Series 1",
            data: {!! json_encode($monthlyData) !!}
        }],
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.7,
                opacityTo: 0.9,
                stops: [0, 90, 100]
            }
        },
        xaxis: {
            categories: {!! json_encode($monthLabels) !!}
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>

</x-layout-admin>
