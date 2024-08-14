
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/bootstrap.min.css')
</head>
<body>
    <div class="container m-auto">
        <h1 class="text-center">Modifier</h1>
        <form>
            <fieldset>
                <legend>Modification</legend>
                <div>
                    <label class="col-form-label mt-4" for="inputDefault">Tâche</label>
                    <input type="text" class="form-control" placeholder="Entrez la tâche" id="inputDefault">
                </div>
                <div>
                    <label for="exampleSelect1" class="form-label mt-4">Etat de la tâche</label>
                    <select class="form-select" id="exampleSelect1">
                        <option value="0">Non réalisée</option>
                        <option value="1">Réalisée</option>
                    </select>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>