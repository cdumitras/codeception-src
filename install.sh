#!/bin/sh
wget http://www.magentocommerce.com/downloads/assets/1.8.1.0/magento-1.8.1.0.tar.gz
tar -zxvf magento-1.8.1.0.tar.gz
wget http://www.magentocommerce.com/downloads/assets/1.6.1.0/magento-sample-data-1.6.1.0.tar.gz
tar -zxvf magento-sample-data-1.6.1.0.tar.gz
mv magento-sample-data-1.6.1.0/media/* magento/media/
mv magento-sample-data-1.6.1.0/magento_sample_data_for_1.6.1.0.sql magento/data.sql
mv magento/* magento/.htaccess* .
chmod -R o+w media var
mysql -h localhost -u storeuser -ppentalog store < data.sql
chmod o+w var var/.htaccess app/etc
rm -rf magento/ magento-sample-data-1.6.1.0/ magento-1.8.1.0.tar.gz magento-sample-data-1.6.1.0.tar.gz data.sql

unzip magento-1.7.0.2.zip
tar -zxvf magento-sample-data-1.6.1.0.tar.gz
mv magento-sample-data-1.6.1.0/media/* magento/media/
mv magento-sample-data-1.6.1.0/magento_sample_data_for_1.6.1.0.sql magento/data.sql
mv magento/* magento/.htaccess* .
chmod -R o+w media var
mysql -h localhost -u magento -ppentalog magento < data.sql
chmod o+w var var/.htaccess app/etc
rm -rf magento/ magento-sample-data-1.6.1.0/ magento-1.7.0.2.zip magento-sample-data-1.6.1.0.tar.gz data.sql


php -f install.php -- \
--license_agreement_accepted "yes" \
--locale "en_US" \
--timezone "Europe/Bucharest" \
--default_currency "USD" \
--db_host "localhost" \
--db_name "store" \
--db_user "storeuser" \
--db_pass "pentalog" \
--db_prefix "" \
--url "http://codeception.dev/" \
--use_rewrites "yes" \
--use_secure "no" \
--secure_base_url "" \
--use_secure_admin "No" \
--admin_firstname "Admin" \
--admin_lastname "User" \
--admin_email "admin@magento.com" \
--admin_username "admin" \
--admin_password "Test1234567" \
--encryption_key "thisisaencryptionkey" \
--skip_url_validation

php -f shell/indexer.php --reindexall
