<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
      <table border='1' margin="10">
        @foreach ($datashortlink as $no => $item)
        
        @if ($no % 7 ==0)
            <tr>
            <td align="center"> <img width="100" src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{$host}}/{{$item->shortlink}}"></img><br>
            {{ $item->nama_link}} 
            </td>
        @else
            <td align="center"> <img width="100" src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{$host}}/{{$item->shortlink}}"></img><br>
            {{ $item->nama_link }} 
            </td>
        @endif
        @endforeach  
        </tr>
      </table>
  </body>
</html>