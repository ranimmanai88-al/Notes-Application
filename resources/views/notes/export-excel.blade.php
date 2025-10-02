<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Export Excel des Notes</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .footer {
            margin-top: 20px;
            text-align: right;
            font-size: 0.8em;
            color: #666666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Export des Notes</h1>
        <p>Généré le: {{ now()->format('d/m/Y H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Titre</th>
                <th>Contenu</th>
                <th>Catégorie</th>
                <th>Statut</th>
                <th>Date de création</th>
                <th>Dernière modification</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notes as $index => $note)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $note->title }}</td>
                <td>{{ $note->body }}</td>
                <td>
                    @if($note->category)
                        <span style="
                            @if($note->category == 'Work') color: #1e40af;
                            @elseif($note->category == 'Personal') color: #9d174d;
                            @elseif($note->category == 'Ideas') color: #5b21b6;
                            @elseif($note->category == 'Blog') color: #92400e;
                            @else color: #9a3412; @endif">
                            {{ $note->category }}
                        </span>
                    @endif
                </td>
                <td>
                    @if($note->status)
                        <span style="
                            @if($note->status === 'Completed') color: #166534;
                            @elseif($note->status === 'Pinned') color: #9a3412;
                            @else color: #991b1b; @endif">
                            {{ $note->status }}
                        </span>
                    @endif
                </td>
                <td>{{ $note->created_at->format('d/m/Y H:i') }}</td>
                <td>{{ $note->updated_at->format('d/m/Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Export généré par {{ auth()->user()->name }}</p>
        <p>Système de gestion de notes - {{ config('app.name') }}</p>
    </div>
</body>
</html>