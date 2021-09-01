#!/bin/sh
# ref: https://help.github.com/articles/adding-an-existing-project-to-github-using-the-command-line/
#
# Usage example: /bin/sh ./git_push.sh wing328 openapi-pestore-perl "minor update" "gitlab.com"

# copy file này cho vào thư mục định tạo theme cho partner để pull code từ echbaytwo về

#
echo $(pwd)
sleep 3;

# download code
git clone https://github.com/itvn9online/echbaytwo.git

# move to root
if [ -d $(pwd)/echbaytwo ]; then
	yes | cp -rf $(pwd)/echbaytwo/* $(pwd)/

	# cleanup
	sleep 3
	rm -rf $(pwd)/echbaytwo
fi
