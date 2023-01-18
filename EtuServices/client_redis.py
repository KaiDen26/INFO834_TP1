import redis as re
import sys

r = re.Redis('localhost', 6379, charset="utf-8", decode_responses=True)

user = sys.arg[1]

def setSession(user):
    r.set(f"{user}_count", 1)
    r.set(f"{user}_time", "valide")
    r.expire(f"{user}_time", 600)
    r.set(user, 1)


def getSession(user):
    return {"timeout": r.get(f"{user}_time"), "count": r.get(f"{user}_count")}

def addUserSession(user):
    r.incr(f"{user}_count")


userSession = getSession(user)
sessionTimeout = userSession["timeout"]
sessionCount = userSession["count"]

if sessionTimeout == None:
    setSession(user)
    print("Nombre de connexions restantes : 9")
else:
    if int(sessionCount) == 9:
        addUserSession(user)
        print(f"Nombre de connexions restantes : Aucune")
    elif int(sessionCount) < 10:
        addUserSession(user)
        print(f"Nombre de connexions restantes : {10 - (int(sessionCount) + 1)}")
    else:
        print(f"Plus de 10 connexions détectés, veuillez réessayez dans {r.ttl(user+'_time') // 60} minutes.")

sys.exit()