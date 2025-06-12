<?php
// Conexão com banco (substitua com suas credenciais)
$conn = new mysqli("localhost", "usuario", "senha", "banco");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $label = $_POST['label'];
    $name = $_POST['name'];
    $tipo = $_POST['tipo'];
    
    $stmt = $conn->prepare("INSERT INTO campos_formulario (label, name, tipo) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $label, $name, $tipo);
    $stmt->execute();
    $stmt->close();
}

$campos = $conn->query("SELECT * FROM campos_formulario");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Configuração de Campos</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 py-10">
  <div class="max-w-4xl mx-auto bg-white p-8 rounded shadow">
    <h1 class="text-2xl font-bold text-gray-700 mb-6">Configuração de Campos do Formulário</h1>

    <form method="POST" class="space-y-4 mb-10">
      <div>
        <label class="block font-semibold text-gray-700">Nome do Campo (Label)</label>
        <input type="text" name="label" required class="w-full px-4 py-2 border rounded" />
      </div>
      <div>
        <label class="block font-semibold text-gray-700">Identificador (name)</label>
        <input type="text" name="name" required class="w-full px-4 py-2 border rounded" />
      </div>
      <div>
        <label class="block font-semibold text-gray-700">Tipo de Campo</label>
        <select name="tipo" required class="w-full px-4 py-2 border rounded">
          <option value="">Selecione o tipo</option>
          <option value="text">Texto</option>
          <option value="textarea">Área de texto</option>
          <option value="number">Número</option>
          <option value="select">Seleção</option>
        </select>
      </div>
      <button type="submit" class="bg-emerald-500 text-white px-6 py-2 rounded hover:bg-emerald-600 transition">Salvar Campo</button>
    </form>

    <h2 class="text-xl font-bold text-gray-700 mb-3">Campos Existentes</h2>
    <table class="min-w-full bg-white border border-gray-300">
      <thead>
        <tr>
          <th class="border px-4 py-2 text-left">Label</th>
          <th class="border px-4 py-2 text-left">Nome</th>
          <th class="border px-4 py-2 text-left">Tipo</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($campo = $campos->fetch_assoc()) : ?>
          <tr>
            <td class="border px-4 py-2"><?= htmlspecialchars($campo['label']) ?></td>
            <td class="border px-4 py-2"><?= htmlspecialchars($campo['name']) ?></td>
            <td class="border px-4 py-2"><?= htmlspecialchars($campo['tipo']) ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
