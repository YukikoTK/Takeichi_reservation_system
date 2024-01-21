<p>{{ $user->name }}さん</p>
<p>{{ $shop->shop }}へご予約いただきありがとうございます。</p>
<p>予約内容は以下の通りです。</p>
<table>
    <tr>
        <th>店舗名</th>
        <td>{{ $shop->shop }}</td>
    </tr>
    <tr>
        <th>予約日</th>
        <td>{{ $bookDetail->date }}</td>
    </tr>
    <tr>
        <th>時間</th>
        <td>{{ date('H:i', strtotime($bookDetail->time)) }}</td>
    </tr>
    <tr>
        <th>人数</th>
        <td>{{ $bookDetail->number }}人</td>
    </tr>
</table>
<p>本日のご来店をお待ちしております。</p>
