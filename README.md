Ustawienia jakie należy zrobić by to działało.

1. W PHPmyadmin utworzyć bazę danych o nazwie votingsystem
2. Zainstalować composera + cmder_mini + jakiegoś Sublime Texta
3. Ustawienia ścieżki zamiast localhost itd.
W C:\XAMPP\apache\conf\extra\httpd-vhosts.conf wkleić ponższe linijki
(Jak nie macie certyfikatów to na necie są komendy na tworzenie certa)
Obsługa HTTPS + obsługa aliasu
```
<VirtualHost dev.votingsite.pl:80>
  DocumentRoot "C:\xampp\htdocs\VotingSystem\public"
  ServerAdmin dev.votingsite.pl
  <Directory "C:\xampp\htdocs\VotingSystem">
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
  </Directory>
</VirtualHost>

<VirtualHost dev.votingsite.pl:443>
    DocumentRoot C:\xampp\htdocs\VotingSystem\public
    ServerName dev.votingsite.pl
    SSLEngine on
    SSLCertificateFile "conf/ssl.crt/server.crt"
    SSLCertificateKeyFile "conf/ssl.key/server.key"
</VirtualHost>
```
4. W C:\Windows\System32\drivers\etc\hosts wklejacie tę linijkę (żeby Windows mógł rozpoznawać adres)

127.0.0.1 	dev.votingsite.pl

5. Jak zainstalujecie composera wystarczy odpalić w cmder_mini "php atrisan migrate" - tworzy wam bazy danych utworzone w Laraverze.
