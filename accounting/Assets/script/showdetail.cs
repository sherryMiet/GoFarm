using System;
using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class showdetail : MonoBehaviour {
    public Text money;

    // Use this for initialization
    IEnumerator showmoney() {
        WWWForm form = new WWWForm();//上傳unity使用者所輸入的資料
        form.AddField("userid", Savedata.id);
        WWW www2 = new WWW("http://163.17.135.213/accounting/connectionforfarm.php", form);
        yield return www2;
        string b;
        b = www2.text;
        b = b.Replace(" ", "");
        b = b.Replace("\r", "");
        b = b.Replace("\n", "");
        b = b.Replace("\t", "");
        b = b.Replace("</br>", "");
        money.text = "" + b;
       Savedata.money = int.Parse(b);
        print("id:"+Savedata.id);
        print("money:"+Savedata.money);
    }
    void Start () {
        StartCoroutine(showmoney());
    }
	
	// Update is called once per frame
	void Update () {
		
	}
}
