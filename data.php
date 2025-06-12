<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard com Gráficos</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/gsap.min.js"></script>
</head>

<body class="bg-gray-100 h-auto w-auto min-h-screen p-2 flex justify-center items-start ">
  <div class="bg-white rounded-xl shadow-2xl p-6 w-full max-w-[95%] lg:max-w-[99%] xl:max-w-[90%] space-y-12 opacity-0 transform scale-100" id="dashboardContainer">

    <h1 class="text-3xl font-bold text-center text-gray-800">Painel de Gráficos</h1>

    <!-- Grade com 2 colunas em telas médias+ -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <div>
        <h2 class="text-lg font-semibold text-gray-700 mb-2">Vendas por Mês</h2>
        <div class="h-64"><canvas id="barChart"></canvas></div>
      </div>

      <div>
        <h2 class="text-lg font-semibold text-gray-700 mb-2">Tendência de Crescimento</h2>
        <div class="h-64"><canvas id="lineChart"></canvas></div>
      </div>

      <div>
        <h2 class="text-lg font-semibold text-gray-700 mb-2">Distribuição por Categoria</h2>
        <div class="h-64"><canvas id="pieChart"></canvas></div>
      </div>

      <div>
        <h2 class="text-lg font-semibold text-gray-700 mb-2">Preferências de Cor</h2>
        <div class="h-64"><canvas id="polarChart"></canvas></div>
      </div>
    </div>
  </div>

  <script>
    // Animação do container
    gsap.to("#dashboardContainer", {
      duration: 1,
      opacity: 1,
      scale: 1,
      ease: "power2.out",
      delay: 0.3
    });

    // Gráfico de Barras
    new Chart(document.getElementById('barChart'), {
      type: 'bar',
      data: {
        labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        datasets: [{
          label: 'Vendas (R$)',
          data: [65, 59, 80, 81, 56, 55, 40],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)'
          ],
          borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        animation: {
          duration: 1000,
          easing: 'easeOutBounce'
        },
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    // Gráfico de Linhas
    new Chart(document.getElementById('lineChart'), {
      type: 'line',
      data: {
        labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        datasets: [{
          label: 'Crescimento (%)',
          data: [5, 10, 8, 15, 20],
          fill: true,
          backgroundColor: 'rgba(16, 185, 129, 0.1)',
          borderColor: 'rgba(16, 185, 129, 1)',
          tension: 0.4,
          pointHoverRadius: 8,
          pointHoverBackgroundColor: 'rgba(16, 185, 129, 1)'
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        animation: {
          duration: 1000,
          easing: 'easeInOutQuad'
        },
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    // Gráfico de Pizza
    new Chart(document.getElementById('pieChart'), {
      type: 'pie',
      data: {
        labels: ['Eletrônicos', 'Roupas', 'Alimentos', 'Livros'],
        datasets: [{
          label: 'Categorias',
          data: [30, 25, 20, 25],
          backgroundColor: [
            'rgba(255, 99, 132, 0.7)',
            'rgba(54, 162, 235, 0.7)',
            'rgba(255, 206, 86, 0.7)',
            'rgba(75, 192, 192, 0.7)'
          ],
          hoverOffset: 10
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        animation: {
          animateRotate: true,
          animateScale: true,
          duration: 1200
        }
      }
    });

    // Gráfico de Área Polar
    new Chart(document.getElementById('polarChart'), {
      type: 'polarArea',
      data: {
        labels: ['Vermelho', 'Verde', 'Amarelo', 'Cinza', 'Azul'],
        datasets: [{
          label: 'Popularidade',
          data: [11, 16, 7, 3, 14],
          backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(75, 192, 192)',
            'rgb(255, 205, 86)',
            'rgb(201, 203, 207)',
            'rgb(54, 162, 235)'
          ],
          borderColor: '#fff',
          borderWidth: 2,
          hoverOffset: 12
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        animation: {
          animateRotate: true,
          animateScale: true,
          duration: 1000,
          easing: 'easeOutCirc'
        }
      }
    });
  </script>
</body>
</html>
