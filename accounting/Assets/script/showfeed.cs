using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class showfeed : MonoBehaviour {
    public Text feed;
    // Use this for initialization
    IEnumerator Showfeed()
    {
        WWWForm form = new WWWForm();//上傳unity使用者所輸入的資料
        form.AddField("userid", Savedata.id);
        WWW www2 = new WWW("http://163.17.135.213/accounting/contofeed.php", form);
        yield return www2;
        string b;
        b = www2.text;
        b = b.Replace(" ", "");
        b = b.Replace("\r", "");
        b = b.Replace("\n", "");
        b = b.Replace("\t", "");
        b = b.Replace("</br>", "");
        feed.text = "" + b;

        Savedata.feed = int.Parse(b);
    }
    // Use this for initialization
    void Start () {
        StartCoroutine(Showfeed());
    }
	
	// Update is called once per frame
	void Update () {

	}
}
