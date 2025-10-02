<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Export PDF des Notes</title>
    <style>
        /* Police compatible avec les PDF */
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            color: #333333;
        }
        
        /* En-tête */
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #4F81BD;
            padding-bottom: 10px;
        }
        
        .header h1 {
            color: #4F81BD;
            font-size: 24px;
            margin-bottom: 5px;
        }
        
        /* Tableau */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        
        th {
            background-color: #4F81BD;
            color: white;
            text-align: left;
            padding: 8px;
            font-weight: bold;
        }
        
        td {
            padding: 8px;
            border-bottom: 1px solid #dddddd;
        }
        
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        /* Styles conditionnels */
        .category-work {
            color: #1e40af;
            font-weight: bold;
        }
        
        .category-personal {
            color: #9d174d;
            font-weight: bold;
        }
        
        .category-ideas {
            color: #5b21b6;
            font-weight: bold;
        }
        
        .status-completed {
            color: #166534;
        }
        
        .status-pinned {
            color: #9a3412;
        }
        
        /* Pied de page */
        .footer {
            text-align: right;
            font-size: 10px;
            color: #666666;
            border-top: 1px solid #dddddd;
            padding-top: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- En-tête du document -->
    <div class="header">
        <h1>Export des Notes</h1>
        <p>Généré le : {{ now()->format('d/m/Y à H:i') }} par {{ auth()->user()->name }}</p>
    </div>

    <!-- Tableau des notes -->
    <table>
        <thead>
            <tr>
                <th width="5%">#</th>
                <th width="20%">Titre</th>
                <th width="30%">Contenu</th>
                <th width="15%">Catégorie</th>
                <th width="10%">Statut</th>
                <th width="10%">Création</th>
                <th width="10%">Modification</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notes as $index => $note)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $note->title }}</td>
                <td>{{ Str::limit($note->body, 50) }}</td>
                <td>
                    @if($note->category)
                        <span class="category-{{ Str::slug($note->category) }}">
                            {{ $note->category }}
                        </span>
                    @else
                        -
                    @endif
                </td>
                <td>
                    @if($note->status)
                        <span class="status-{{ Str::slug($note->status) }}">
                            {{ $note->status }}
                        </span>
                    @else
                        -
                    @endif
                </td>
                <td>{{ $note->created_at->format('d/m/Y') }}</td>
                <td>{{ $note->updated_at->format('d/m/Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pied de page -->
    <div class="footer">
        <p>{{ config('app.name') }} - Page {PAGENO}/{nbpg}</p>
    </div>
</body>
</html>