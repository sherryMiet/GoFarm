using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
public class lottoTimes : MonoBehaviour {
    public Text msn;
	// Use this for initialization
	void Start () {
        StartCoroutine(SetLottoTimes());
    }
	
	// Update is called once per frame
	void Update () {
		
	}
    IEnumerator SetLottoTimes()
    {
        WWWForm form = new WWWForm();//上傳unity使用者所輸入的資料
        form.AddField("userid", Savedata.id);

        WWW www = new WWW("http://163.17.135.213/accounting/InvoiceTimes.php", form);
        yield return www;
        string b;
        b = www.text;
        b = b.Replace(" ", "");
        b = b.Replace("\r", "");
        b = b.Replace("\n", "");
        b = b.Replace("\t", "");
        b = b.Replace("</br>", "");
        msn.text = "你還剩下" + b + "次機會";
        Savedata.lottoTimes = int.Parse(b);
    }
}
