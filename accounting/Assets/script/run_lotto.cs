using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class run_lotto : MonoBehaviour {

    public Image[] Items;//產生物件存放處
    public Text text;
    public GameObject panel;
    public Text msn;
    private string[] show_prize =new string[4];
    int i;
    // Use this for initialization
    void Start ()
    {
        show_prize[0]= "小雞X1";
        show_prize[1]= "小豬X1";
        show_prize[2]= "小牛X1";
        show_prize[3] = "飼料X1";
        for (i = 0; i < Items.Length; i++)
        {
            Items[i].gameObject.SetActive(false);//關閉顯示物件
        }

    }
	
	// Update is called once per frame
	void Update () {
		
	}

    public void pick() {

        if (Savedata.lottoTimes > 0)
        {
            int ran = Random.Range(0, 4);
            for (i = 0; i < Items.Length; i++)
            {

                Items[i].gameObject.SetActive(false);//關閉顯示物件
            }
            Items[ran].gameObject.SetActive(true);//隨機顯示物件
            text.text = "" + show_prize[ran];
            Savedata.lottoTimes--;
            msn.text = "你還剩" + Savedata.lottoTimes + "次機會";
            StartCoroutine(sentanimal(ran));

        }
        else
        {
            panel.SetActive(true);
        }
    }
    IEnumerator sentanimal(int ran)
    {
        if(ran==0)
        {
            WWWForm form = new WWWForm();//上傳unity使用者所輸入的資料
            form.AddField("action", "chick");
            form.AddField("id", Savedata.id);
            form.AddField("lotto", Savedata.lottoTimes);
            WWW www = new WWW("http://163.17.135.213/accounting/sentanimal.php", form);
            yield return www;
            if (!string.IsNullOrEmpty(www.error))
            {
                Debug.Log(www.error);
            }
            Debug.Log( www.text);
        }
        if (ran == 1)
        {
            WWWForm form = new WWWForm();//上傳unity使用者所輸入的資料
            form.AddField("action", "pig");
            form.AddField("id", Savedata.id);
            form.AddField("lotto", Savedata.lottoTimes);
            WWW www = new WWW("http://163.17.135.213/accounting/sentanimal.php", form);
            yield return www;
            if (!string.IsNullOrEmpty(www.error))
            {
                Debug.Log(www.error);
            }
            Debug.Log(www.text);
        }
        if (ran == 2)
        {
            WWWForm form = new WWWForm();//上傳unity使用者所輸入的資料
            form.AddField("action", "ox");
            form.AddField("id", Savedata.id);
            form.AddField("lotto", Savedata.lottoTimes);
            WWW www = new WWW("http://163.17.135.213/accounting/sentanimal.php", form);
            yield return www;
            if (!string.IsNullOrEmpty(www.error))
            {
                Debug.Log(www.error);
            }
            Debug.Log( www.text);
        }
        if (ran == 3)
        {
            WWWForm form = new WWWForm();//上傳unity使用者所輸入的資料
            form.AddField("action", "feed");
            form.AddField("id", Savedata.id);
            form.AddField("lotto", Savedata.lottoTimes);
            WWW www = new WWW("http://163.17.135.213/accounting/sentanimal.php", form);
            yield return www;
            if (!string.IsNullOrEmpty(www.error))
            {
                Debug.Log(www.error);
            }
            Debug.Log(www.text);
        }

    }

}
