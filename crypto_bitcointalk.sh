xi=1
wget --header='Accept-Language: en-us,en;q=0.5' -T 600 hhttp://127.0.0.1/karbitexchanges/coin/ins_bleutrade --delete-after
wget --header='Accept-Language: en-us,en;q=0.5' -T 600 hhttp://127.0.0.1/karbitexchanges/coin/ins_bittrex --delete-after
wget --header='Accept-Language: en-us,en;q=0.5' -T 600 hhttp://127.0.0.1/karbitexchanges/coin/ins_poloniex --delete-after
wget --header='Accept-Language: en-us,en;q=0.5' -T 600 hhttp://127.0.0.1/karbitexchanges/coin/ins_hitbtc --delete-after
wget --header='Accept-Language: en-us,en;q=0.5' -T 600 hhttp://127.0.0.1/karbitexchanges/coin/ins_liquiio --delete-after

wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/bitcointalk/tambah_marketplacealtcoin?halaman=0 --delete-after
sleep 20
wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/bitcointalk/tambah_announcementaltcoin?halaman=0 --delete-after
sleep 20
wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/bitcointalk/tambah_service?halaman=0 --delete-after
sleep 20
wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/bitcointalk/tambah_marketplacealtcoin?halaman=40 --delete-after
sleep 20
wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/bitcointalk/tambah_announcementaltcoin?halaman=40 --delete-after
sleep 20
wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/bitcointalk/tambah_service?halaman=40 --delete-after
sleep 20
wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/bitcointalk/tambah_marketplacealtcoin?halaman=80 --delete-after
sleep 20
wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/bitcointalk/tambah_announcementaltcoin?halaman=80 --delete-after
sleep 20
wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/bitcointalk/tambah_service?halaman=80 --delete-after
sleep 20
wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/bitcointalk/giveaway_bitcoingarden --delete-after
sleep 20
wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/bitcointalk/giveaway_bitcoingarden?halaman=20 --delete-after
sleep 20
	
while true
do 
        wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/bitcointalk/tambah_marketplacealtcoin?halaman=0 --delete-after
        sleep 20
        wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/bitcointalk/tambah_announcementaltcoin?halaman=0 --delete-after
        sleep 20
        wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/bitcointalk/tambah_service?halaman=0 --delete-after
        sleep 20
        wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/bitcointalk/tambah_marketplacealtcoin?halaman=40 --delete-after
        sleep 20
        wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/bitcointalk/tambah_announcementaltcoin?halaman=40 --delete-after
        sleep 20
        wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/bitcointalk/tambah_service?halaman=40 --delete-after
        sleep 20
        wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/bitcointalk/tambah_marketplacealtcoin?halaman=80 --delete-after
        sleep 20
        wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/bitcointalk/tambah_announcementaltcoin?halaman=80 --delete-after
        sleep 20
        wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/bitcointalk/tambah_service?halaman=80 --delete-after
        sleep 20
        wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/bitcointalk/giveaway_bitcoingarden --delete-after
        sleep 20
        wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/bitcointalk/giveaway_bitcoingarden?halaman=20 --delete-after
	    sleep 300
	    
	    xi=$(bc <<< "$xi+1")
        if [ $xi -ge 10 ]; then
		    xi=0
		    wget --header='Accept-Language: en-us,en;q=0.5' -T 600 hhttp://127.0.0.1/karbitexchanges/coin/ins_bleutrade --delete-after
		    wget --header='Accept-Language: en-us,en;q=0.5' -T 600 hhttp://127.0.0.1/karbitexchanges/coin/ins_bittrex --delete-after
		    wget --header='Accept-Language: en-us,en;q=0.5' -T 600 hhttp://127.0.0.1/karbitexchanges/coin/ins_poloniex --delete-after
		    wget --header='Accept-Language: en-us,en;q=0.5' -T 600 hhttp://127.0.0.1/karbitexchanges/coin/ins_hitbtc --delete-after
		    wget --header='Accept-Language: en-us,en;q=0.5' -T 600 hhttp://127.0.0.1/karbitexchanges/coin/ins_liquiio --delete-after
        fi
done
