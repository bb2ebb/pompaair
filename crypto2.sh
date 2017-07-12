while true
do                                                                                                                               
   wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/input/insert_bittrex --delete-after
   wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/input/insert_poloniex --delete-after
   wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/input/update_poloniex --delete-after
   wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/input/update_bittrex --delete-after
   wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/input/insert_bleutrade --delete-after
   wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/input/insert_btce --delete-after
   wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/input/insert_ccex --delete-after
   wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/input/insert_cryptopia --delete-after
   wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/input/insert_vipbtckoid --delete-after
   wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/input/insert_yobit --delete-after
   wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/input/e_poloniex --delete-after
   wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/input/d_poloniex --delete-after
   wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/input/e_bittrex --delete-after
   wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/input/d_bittrex --delete-after
   wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/input/d_ccex --delete-after
   wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/input/e_ccex --delete-after
   wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/input/update_bleutrade --delete-after
   wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/input/update_btce --delete-after
   wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/input/update_ccex --delete-after
   wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/input/update_cryptopia --delete-after
   wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/input/update_vipbtckoid --delete-after
   wget --header='Accept-Language: en-us,en;q=0.5' -T 600 http://127.0.0.1/karbitexchanges/input/update_yobit --delete-after
   sleep 300
done
