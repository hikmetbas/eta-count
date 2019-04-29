import json
import time
import urllib.request

def countBoards():
    conditionsSetURL = 'http://localhost/count.php'
    newConditions = {"request_type": "0", "city": "", "result": ""}
    params = json.dumps(newConditions).encode('utf8')
    req = urllib.request.Request(conditionsSetURL, data=params,
                                 headers={'content-type': 'application/json'})
    j = json.loads(urllib.request.urlopen(req).read().decode('utf8'))

    f = open("count.txt", "w+")
    f.write(j['result'])
    f.close()

if __name__ == "__main__":
    while True:
        countBoards()
        time.sleep(1)

    countBoards()
